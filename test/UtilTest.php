<?php

namespace Checkdomain\Holiday\Test;

class UtilTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @var \Checkdomain\Holiday\Util
     */
    protected $service;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->service = new \Checkdomain\Holiday\Util();
    }

    /**
     * @param string $iso
     * @param string $date
     * @param array  $expectation
     *
     * @dataProvider providerHoliday
     */
    public function testIsHoliday($iso, $date, array $expectation)
    {
        $isHoliday = $this->service->isHoliday($iso, $date);

        $this->assertEquals($expectation[0], $isHoliday);
    }

    /**
     * @param string $iso
     * @param string $date
     * @param array  $expectation
     *
     * @dataProvider providerHoliday
     */
    public function testGetHoliday($iso, $date, array $expectation)
    {
        $holiday = $this->service->getHoliday($iso, $date);

        if ($expectation[1] === null) {
            $this->assertNull($holiday);
        } else {
            $this->assertNotNull($holiday);

            foreach ($expectation[1] as $property => $expected) {
                $method = 'get'.ucfirst($property);
                $actual = $holiday->$method();

                $this->assertEquals($expected, $actual);
            }
        }
    }

    /**
     * @return array
     */
    public function providerHoliday()
    {
        return array(
            array('DE', '2013-12-25', array(true, array(
                'name' => '1. Weihnachtstag'
            ))),
            array('DE', '2013-05-01', array(true, array(
                'name' => 'Tag der Arbeit'
            ))),
            array('DE', '2013-01-02', array(false, null)),
            array('DE', '2038-04-26', array(true, array(
                'name' => 'Ostermontag'
            )))
        );
    }

}
