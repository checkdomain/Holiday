<?php

namespace Checkdomain\Holiday\Provider;


/**
 * Class DE
 */
class ATTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Checkdomain\Holiday\Provider\DE
     */
    protected $provider;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new AT();
    }

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
            $this->assertNotNull($holiday, 'No Holiday found but assumed to find one on '.$date->format('Y-m-d'));
            $this->assertEquals($date->format('d.m.Y'), $holiday->getDate()->format('d.m.Y'));

            foreach ($expectation as $property => $expectedValue) {
                $method = 'get'.ucfirst($property);
                $value = $holiday->$method();

                $this->assertEquals($expectedValue, $value);
            }
        }
    }

    /**
     * Provides some test dates and the expectation
     *
     * @return array
     */
    public function dateProvider()
    {
        return [
            ['01.01.2013', null, ['name' => 'Neujahr']],
            ['06.01.2013', null, ['name' => 'Heilige Drei Könige']],
            ['01.04.2013', null, ['name' => 'Ostermontag']],
            ['01.05.2013', null, ['name' => 'Staatsfeiertag']],
            ['09.05.2013', null, ['name' => 'Christi Himmelfahrt']],
            ['20.05.2013', null, ['name' => 'Pfingstmontag']],
            ['30.05.2013', null, ['name' => 'Fronleichnam']],
            ['15.08.2013', null, ['name' => 'Mariä Himmelfahrt']],
            ['26.10.2013', null, ['name' => 'Nationalfeiertag']],
            ['01.11.2013', null, ['name' => 'Allerheiligen']],
            ['08.12.2013', null, ['name' => 'Mariä Empfängnis']],
            ['25.12.2013', null, ['name' => 'Weihnachten']],
            ['26.12.2013', null, ['name' => 'Stefanitag']],
            ['01.01.2015', null, ['name' => 'Neujahr']],
            ['06.01.2015', null, ['name' => 'Heilige Drei Könige']],
            ['06.04.2015', null, ['name' => 'Ostermontag']],
            ['01.05.2015', null, ['name' => 'Staatsfeiertag']],
            ['14.05.2015', null, ['name' => 'Christi Himmelfahrt']],
            ['25.05.2015', null, ['name' => 'Pfingstmontag']],
            ['04.06.2015', null, ['name' => 'Fronleichnam']],
            ['15.08.2015', null, ['name' => 'Mariä Himmelfahrt']],
            ['26.10.2015', null, ['name' => 'Nationalfeiertag']],
            ['01.11.2015', null, ['name' => 'Allerheiligen']],
            ['08.12.2015', null, ['name' => 'Mariä Empfängnis']],
            ['25.12.2015', null, ['name' => 'Weihnachten']],
            ['26.12.2015', null, ['name' => 'Stefanitag']],
        ];
    }

}
