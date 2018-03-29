<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class ROTest
 */
class ROTest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new RO();
    }

    /**
     * Provides some test dates and the expectation
     *
     * vendor/bin/phpunit --filter ROTest
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

            array('2018-01-01', null, array('name' => 'Anul Nou')),
            array('2018-01-02', null, array('name' => 'Anul Nou')),
            array('2018-01-24', null, array('name' => 'Unirea Principatelor Române/Mica Unire')),
            array('2018-05-01', null, array('name' => 'Ziua Muncii')),
            array('2018-06-01', null, array('name' => 'Ziua Copilului')),
            array('2018-08-15', null, array('name' => 'Adormirea Maicii Domnului/Sfânta Maria Mare')),
            array('2018-11-30', null, array('name' => 'Sfântul Andrei')),
            array('2018-12-01', null, array('name' => 'Ziua Națională/Ziua Marii Uniri')),
            array('2018-12-25', null, array('name' => 'Crăciunul')),
            array('2018-12-26', null, array('name' => 'Crăciunul')),

            // Easter dates 2018
            array('2018-04-06', null, array('name' => 'Paștele')),
            array('2018-04-08', null, array('name' => 'Paștele')),
            array('2018-04-09', null, array('name' => 'Paștele')),
            array('2018-05-27', null, array('name' => 'Rusaliile')),
            array('2018-05-28', null, array('name' => 'Rusaliile')),

            // Easter dates 2019
            array('2019-04-26', null, array('name' => 'Paștele')),
            array('2019-04-28', null, array('name' => 'Paștele')),
            array('2019-04-29', null, array('name' => 'Paștele')),
            array('2019-06-16', null, array('name' => 'Rusaliile')),
            array('2019-06-17', null, array('name' => 'Rusaliile')),
        );
    }
}
