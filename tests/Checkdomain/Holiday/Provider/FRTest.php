<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class FR
 */
class FRTest extends \PHPUnit_Framework_TestCase
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
        $this->provider = new FR();
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
            array('21.03.2014', null, null),
            array('01.01.2014', null, array('name' => 'Jour de l\'an')),
            array('21.04.2014', null, array('name' => 'Lundi de Pâques')),
            array('01.05.2014', null, array('name' => 'Fête du Travail')),
            array('08.05.2014', null, array('name' => '8 Mai 1945')),
            array('29.05.2014', null, array('name' => 'Jeudi de l\'Ascension')),
            array('09.06.2014', null, array('name' => 'Lundi de Pentecôte')),
            array('14.07.2014', null, array('name' => 'Fête Nationale')),
            array('15.08.2014', null, array('name' => 'Assomption')),
            array('01.11.2014', null, array('name' => 'La Toussaint')),
            array('11.11.2014', null, array('name' => 'Armistice')),
            array('25.12.2014', null, array('name' => 'Noël')),
        );
    }


} 