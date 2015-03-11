<?php
/**
 * Italian holiday provider
 * 
 * @author Giorgio Cefaro <giorgio.cefaro@gmail.com>
 * @since 2015-03-11
 */
namespace Checkdomain\Holiday\Provider;

/**
 * Class IT
 */
class ITTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Checkdomain\Holiday\Provider\IT
     */
    protected $provider;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new IT();
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
			array('01.01.2010', null, array('name' => 'Capodanno')),

            array('24.04.2014', null, null),
            array('25.04.2014', null, array('name' => 'Liberazione dal nazifascismo (1945)')),
            array('01.01.2014', null, array('name' => 'Capodanno')),

            array('20.04.2014', null, array('name' => 'Pasqua')),
            array('21.04.2014', null, array('name' => 'Lunedì di Pasqua')),

            array('25.12.2016', null, array('name' => 'Natale di Gesù')),
            array('26.12.2016', null, array('name' => 'Santo Stefano')),

            array('02.06.2016', null, array('name' => 'Festa della Repubblica')),
            array('15.08.2016', null, array('name' => 'Assunzione di Maria')),
        );
    }

}
