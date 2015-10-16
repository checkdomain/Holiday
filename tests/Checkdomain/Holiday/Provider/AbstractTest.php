<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class DK
 */
abstract class AbstractTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Checkdomain\Holiday\ProviderInterface
     */
    protected $provider;

    /**
     * @param string $date
     * @param string $state
     * @param array  $expectation
     *
     * @dataProvider dateProvider
     */
    public function testHolidays($date, $state = null, array $expectation = null)
    {
        $date    = new \DateTime($date);
        $holiday = $this->provider->getHolidayByDate($date, $state);

        if ($expectation === null) {
            $this->assertNull($holiday);
        } else {
            $this->assertNotNull($holiday, 'No Holiday found but assumed to find one on ' . $date->format('Y-m-d'));
            $this->assertEquals($date->format('d.m.Y'), $holiday->getDate()->format('d.m.Y'));

            foreach ($expectation as $property => $expectedValue) {
                $method = 'get' . ucfirst($property);
                $value = $holiday->$method();

                $this->assertEquals($expectedValue, $value);
            }
        }
    }
}
