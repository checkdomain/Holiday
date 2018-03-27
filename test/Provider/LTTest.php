<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class LTTest
 */
class LTTest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new LT();
    }

    /**
     * Provides some test dates and the expectation
     *
     * vendor/bin/phpunit --filter LTTest
     *
     * @return array
     */
    public function dateProvider()
    {
        return array(
            array('2018-01-03', null, null),
            array('2018-03-21', null, null),
            array('2018-03-22', null, null),
            array('2018-12-27', null, null),

            array('2018-01-01', null, array('name' => 'Naujieji metai')),
            array('2018-02-16', null, array('name' => 'Lietuvos valstybės atkūrimo diena')),
            array('2018-03-11', null, array('name' => 'Lietuvos nepriklausomybės atkūrimo diena')),
            array('2018-05-01', null, array('name' => 'Tarptautinė darbo diena')),
            array('2018-06-24', null, array('name' => 'Joninės, Rasos')),
            array('2018-07-06', null, array('name' => 'Valstybės (Lietuvos karaliaus Mindaugo karūnavimo) diena')),
            array('2018-08-15', null, array('name' => 'Žolinė (Švč. Mergelės Marijos ėmimo į dangų diena)')),
            array('2018-11-01', null, array('name' => 'Visų šventųjų diena (Vėlinės)')),
            array('2018-12-24', null, array('name' => 'Šv. Kūčios')),
            array('2018-12-25', null, array('name' => 'Šv. Kalėdos')),
            array('2018-12-26', null, array('name' => 'Šv. Kalėdos')),

            // Motinos diena floating holiday (First Sunday in May)
            array('2018-05-06', null, array('name' => 'Motinos diena')),

            // Tėvo diena floating holiday (First Sunday in June)
            array('2018-06-03', null, array('name' => 'Tėvo diena')),

            // Easter dates 2018
            array('2018-04-01', null, array('name' => 'Velykos')),

            // Easter dates 2019
            array('2019-04-21', null, array('name' => 'Velykos')),
        );
    }
}
