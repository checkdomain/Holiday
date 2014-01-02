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
     * @param string $date
     * @param string $iso
     * @param array  $expectation
     *
     * @dataProvider providerHoliday
     */
    public function testIsHoliday($date, $iso, array $expectation)
    {
        $isHoliday = $this->service->isHoliday($date, $iso);

        $this->assertEquals($expectation[0], $isHoliday);
    }

    /**
     * @param string $date
     * @param string $iso
     * @param array  $expectation
     *
     * @dataProvider providerHoliday
     */
    public function testGetHoliday($date, $iso, array $expectation)
    {
        $holiday = $this->service->getHoliday($date, $iso);

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
            array('25.12.2013', 'DE', array(true, array(
                'name' => '1. Weihnachtstag',
                'national' => true
            ))),
            array('01.05.2013', 'DE', array(true, array(
                'name' => 'Tag der Arbeit',
                'national' => true
            ))),
            array('02.01.2013', 'DE', array(false, null))
        );
    }

}