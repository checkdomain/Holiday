<?php

namespace Checkdomain\Holiday\Provider;


/**
 * Class NO
 */
class NOTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Checkdomain\Holiday\Provider\NO
     */
    protected $provider;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new NO();
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
            $this->assertNotNull($holiday, 'No Holiday found but assumed to find one on '.$date->format('d.m.Y'));
            $this->assertEquals($date->format('d.m.Y'), $holiday->getDate()->format('d.m.Y'));

            foreach ($expectation as $property => $expectatedValue) {
                $method = 'get'.ucfirst($property);
                $value = $holiday->$method();

                $this->assertEquals($expectatedValue, $value);
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
        return array(
			#Test holidays in past years
            array('21.03.2010', null, null),
			array('01.01.2010', null, array('name' => '1. nyttårsdag')),
			
			array('01.04.2010', null, array('name' => 'Skjærtorsdag')),
			array('02.04.2010', null, array('name' => 'Langfredag')),
			array('04.04.2010', null, array('name' => '1. påskedag')),
			array('05.04.2010', null, array('name' => '2. påskedag')),
			
			array('01.05.2010', null, array('name' => '1. mai')),
			array('13.05.2010', null, array('name' => 'Kristi Himmelfartsdag')),
			array('17.05.2010', null, array('name' => 'Grunnlovsdagen')),
			
			array('24.05.2010', null, array('name' => '2. pinsedag')),

			array('25.12.2010', null, array('name' => '1. juledag')), 
			array('26.12.2010', null, array('name' => '2. juledag')),

			#Test current year, (when writing these tests)
			array('21.03.2014', null, null),
			array('01.01.2014', null, array('name' => '1. nyttårsdag')),
			
			array('17.04.2014', null, array('name' => 'Skjærtorsdag')),
			array('18.04.2014', null, array('name' => 'Langfredag')),
			array('20.04.2014', null, array('name' => '1. påskedag')),
			array('21.04.2014', null, array('name' => '2. påskedag')),
			
			array('01.05.2014', null, array('name' => '1. mai')),
			array('29.05.2014', null, array('name' => 'Kristi Himmelfartsdag')),
			array('17.05.2014', null, array('name' => 'Grunnlovsdagen')),
			
			array('09.06.2014', null, array('name' => '2. pinsedag')),

			array('25.12.2014', null, array('name' => '1. juledag')), 
			array('26.12.2014', null, array('name' => '2. juledag')),


			#Test in the future
			array('21.03.2016', null, null),
			array('01.01.2016', null, array('name' => '1. nyttårsdag')),
			
			array('24.03.2016', null, array('name' => 'Skjærtorsdag')),
			array('25.03.2016', null, array('name' => 'Langfredag')),
			array('27.03.2016', null, array('name' => '1. påskedag')),
			array('28.03.2016', null, array('name' => '2. påskedag')),
			
			array('01.05.2016', null, array('name' => '1. mai')),
			array('05.05.2016', null, array('name' => 'Kristi Himmelfartsdag')),
			array('17.05.2016', null, array('name' => 'Grunnlovsdagen')),
			
			array('16.05.2016', null, array('name' => '2. pinsedag')),

			array('25.12.2016', null, array('name' => '1. juledag')), 
			array('26.12.2016', null, array('name' => '2. juledag')),
        );
    }

}
