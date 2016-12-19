<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class AUTest
 */
class AUTest extends \PHPUnit_Framework_TestCase {

    public function testNewYearsDay() {
        $au = new AU();
        // 2015.
        $this->assertEquals("New Year's Day", $au->getHolidayByDate(new \DateTime('2015-01-01'))->getName());
        // 2016.
        $this->assertEquals("New Year's Day", $au->getHolidayByDate(new \DateTime('2016-01-01'))->getName());
        // 2017 (the 1st is a Sunday).
        $this->assertNull($au->getHolidayByDate(new \DateTime('2017-01-01')));
        $this->assertEquals("New Year's Day", $au->getHolidayByDate(new \DateTime('2017-01-02'))->getName());
    }

    public function testAustraliaDay() {
        $au = new AU();
        // 2014 (the 26th was a Sunday).
        $this->assertNull($au->getHolidayByDate(new \DateTime('2014-01-26')));
        $this->assertEquals("Australia Day", $au->getHolidayByDate(new \DateTime('2014-01-27'))->getName());
        // 2015.
        $this->assertEquals("Australia Day", $au->getHolidayByDate(new \DateTime('2015-01-26'))->getName());
        // 2016.
        $this->assertEquals("Australia Day", $au->getHolidayByDate(new \DateTime('2016-01-26'))->getName());
    }

    public function testAnzacDay() {
        $au = new AU();
        $this->assertEquals("ANZAC Day", $au->getHolidayByDate(new \DateTime('2011-04-25'))->getName());
        $this->assertEquals("ANZAC Day", $au->getHolidayByDate(new \DateTime('2014-04-25'))->getName());
        $this->assertEquals("ANZAC Day", $au->getHolidayByDate(new \DateTime('2015-04-27'))->getName());
        $this->assertEquals("ANZAC Day", $au->getHolidayByDate(new \DateTime('2016-04-25'))->getName());
    }

    public function testEaster() {
        $au = new AU();
        $this->assertEquals("Easter Monday Holiday", $au->getHolidayByDate(new \DateTime('2011-04-26'))->getName());
        $this->assertEquals("Good Friday", $au->getHolidayByDate(new \DateTime('2015-04-03'))->getName());
        $this->assertEquals("Easter Monday", $au->getHolidayByDate(new \DateTime('2015-04-06'))->getName());
    }

}
