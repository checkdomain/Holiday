<?php
/**
 * Swedish holiday provider
 *
 * @author Martin Lindhe
 * @since 2015-03-22
 */
namespace Checkdomain\Holiday\Provider;

/**
 * Class SETest
 */
class SETest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new SE();
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
            array('2010-03-21', null, null),
            array('2010-01-01', null, array('name' => 'Nyårsdagen')),
            array('2010-01-05', null, array('name' => 'Trettondagsafton')),
            array('2010-01-06', null, array('name' => 'Trettondedag jul')),

            array('2010-04-01', null, array('name' => 'Skärtorsdagen')),
            array('2010-04-02', null, array('name' => 'Långfredagen')),
            array('2010-04-03', null, array('name' => 'Påskafton')),
            array('2010-04-04', null, array('name' => 'Påskdagen')),
            array('2010-04-05', null, array('name' => 'Annandag påsk')),

            array('2010-04-30', null, array('name' => 'Valborgsmässoafton')),
            array('2010-05-01', null, array('name' => 'Första maj')),
            array('2010-05-13', null, array('name' => 'Kristi himmelsfärdsdag')),
            array('2010-05-22', null, array('name' => 'Pingstafton')),
            array('2010-05-23', null, array('name' => 'Pingstdagen')),
            array('2010-06-06', null, array('name' => 'Sveriges nationaldag')),
            array('2010-06-25', null, array('name' => 'Midsommarafton')),
            array('2010-06-26', null, array('name' => 'Midsommardagen')),
            array('2010-11-05', null, array('name' => 'Allhelgonaafton')),
            array('2010-11-06', null, array('name' => 'Alla helgons dag')),
            array('2010-12-24', null, array('name' => 'Julafton')),
            array('2010-12-25', null, array('name' => 'Juldagen')),
            array('2010-12-26', null, array('name' => 'Annandag jul')),
            array('2010-12-31', null, array('name' => 'Nyårsafton')),

            #Test current year, (when writing these tests)
            array('2015-03-21', null, null),
            array('2015-01-01', null, array('name' => 'Nyårsdagen')),
            array('2015-01-05', null, array('name' => 'Trettondagsafton')),
            array('2015-01-06', null, array('name' => 'Trettondedag jul')),

            array('2015-04-02', null, array('name' => 'Skärtorsdagen')),
            array('2015-04-03', null, array('name' => 'Långfredagen')),
            array('2015-04-04', null, array('name' => 'Påskafton')),
            array('2015-04-05', null, array('name' => 'Påskdagen')),
            array('2015-04-06', null, array('name' => 'Annandag påsk')),

            array('2015-04-30', null, array('name' => 'Valborgsmässoafton')),
            array('2015-05-01', null, array('name' => 'Första maj')),
            array('2015-05-14', null, array('name' => 'Kristi himmelsfärdsdag')),
            array('2015-05-23', null, array('name' => 'Pingstafton')),
            array('2015-05-24', null, array('name' => 'Pingstdagen')),
            array('2015-06-06', null, array('name' => 'Sveriges nationaldag')),
            array('2015-06-19', null, array('name' => 'Midsommarafton')),
            array('2015-06-20', null, array('name' => 'Midsommardagen')),
            array('2015-10-30', null, array('name' => 'Allhelgonaafton')),
            array('2015-10-31', null, array('name' => 'Alla helgons dag')),
            array('2015-12-24', null, array('name' => 'Julafton')),
            array('2015-12-25', null, array('name' => 'Juldagen')),
            array('2015-12-26', null, array('name' => 'Annandag jul')),
            array('2015-12-31', null, array('name' => 'Nyårsafton')),
        );
    }
}
