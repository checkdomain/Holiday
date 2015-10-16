<?php

namespace Checkdomain\Holiday\Test;

class UtilTest extends \PHPUnit_Framework_TestCase
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
            array('DE', '25.12.2013', array(true, array(
                'name' => '1. Weihnachtstag'
            ))),
            array('DE', '01.05.2013', array(true, array(
                'name' => 'Tag der Arbeit'
            ))),
            array('DE', '02.01.2013', array(false, null)),
            array('DE', '26.04.2038', array(true, array(
                'name' => 'Ostermontag'
            )))
        );
    }

}
