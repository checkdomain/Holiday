<?php
/**
 * Swedish holiday provider
 *
 * @author Martin Lindhe
 * @since 2015-03-22
 */
namespace Checkdomain\Holiday\Provider;

/**
 * Class SE
 */
class SETest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Checkdomain\Holiday\Provider\SE
     */
    protected $provider;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new SE();
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
            # Test holidays in past year
            array('21.03.2010', null, null),
            array('01.01.2010', null, array('name' => 'Nyårsdagen')),
            array('05.01.2010', null, array('name' => 'Trettondagsafton')),
            array('06.01.2010', null, array('name' => 'Trettondedag jul')),

            array('01.04.2010', null, array('name' => 'Skärtorsdagen')),
            array('02.04.2010', null, array('name' => 'Långfredagen')),
            array('03.04.2010', null, array('name' => 'Påskafton')),
            array('04.04.2010', null, array('name' => 'Påskdagen')),
            array('05.04.2010', null, array('name' => 'Annandag påsk')),

            array('30.04.2010', null, array('name' => 'Valborgsmässoafton')),
            array('01.05.2010', null, array('name' => 'Första maj')),
            array('13.05.2010', null, array('name' => 'Kristi himmelsfärdsdag')),
            array('22.05.2010', null, array('name' => 'Pingstafton')),
            array('23.05.2010', null, array('name' => 'Pingstdagen')),
            array('06.06.2010', null, array('name' => 'Sveriges nationaldag')),
            array('25.06.2010', null, array('name' => 'Midsommarafton')),
            array('26.06.2010', null, array('name' => 'Midsommardagen')),
            array('05.11.2010', null, array('name' => 'Allhelgonaafton')),
            array('06.11.2010', null, array('name' => 'Alla helgons dag')),
            array('24.12.2010', null, array('name' => 'Julafton')),
            array('25.12.2010', null, array('name' => 'Juldagen')),
            array('26.12.2010', null, array('name' => 'Annandag jul')),
            array('31.12.2010', null, array('name' => 'Nyårsafton')),

            #Test current year, (when writing these tests)
            array('21.03.2015', null, null),
            array('01.01.2015', null, array('name' => 'Nyårsdagen')),
            array('05.01.2015', null, array('name' => 'Trettondagsafton')),
            array('06.01.2015', null, array('name' => 'Trettondedag jul')),

            array('02.04.2015', null, array('name' => 'Skärtorsdagen')),
            array('03.04.2015', null, array('name' => 'Långfredagen')),
            array('04.04.2015', null, array('name' => 'Påskafton')),
            array('05.04.2015', null, array('name' => 'Påskdagen')),
            array('06.04.2015', null, array('name' => 'Annandag påsk')),

            array('30.04.2015', null, array('name' => 'Valborgsmässoafton')),
            array('01.05.2015', null, array('name' => 'Första maj')),
            array('14.05.2015', null, array('name' => 'Kristi himmelsfärdsdag')),
            array('23.05.2015', null, array('name' => 'Pingstafton')),
            array('24.05.2015', null, array('name' => 'Pingstdagen')),
            array('06.06.2015', null, array('name' => 'Sveriges nationaldag')),
            array('19.06.2015', null, array('name' => 'Midsommarafton')),
            array('20.06.2015', null, array('name' => 'Midsommardagen')),
            array('30.10.2015', null, array('name' => 'Allhelgonaafton')),
            array('31.10.2015', null, array('name' => 'Alla helgons dag')),
            array('24.12.2015', null, array('name' => 'Julafton')),
            array('25.12.2015', null, array('name' => 'Juldagen')),
            array('26.12.2015', null, array('name' => 'Annandag jul')),
            array('31.12.2015', null, array('name' => 'Nyårsafton')),
        );
    }

}
