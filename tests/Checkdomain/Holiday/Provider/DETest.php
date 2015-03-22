<?php

namespace Checkdomain\Holiday\Provider;


/**
 * Class DE
 */
class DETest extends \PHPUnit_Framework_TestCase
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
        $this->provider = new DE();
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
        return array(
            array('21.03.2013', null, null),
            array('01.01.2013', null, array('name' => 'Neujahr')),
            array('06.01.2013', DE::STATE_BY, array('name' => 'Heilige Drei Könige')),
            array('06.01.2013', DE::STATE_SH, null),
            array('19.06.2014', DE::STATE_HE, array('name' => 'Fronleichnam')),
            array('19.06.2014', DE::STATE_SH, null),
            array('01.11.2014', DE::STATE_BW, array('name' => 'Allerheiligen')),
            array('01.11.2014', DE::STATE_SH, null),
        );
    }

}
