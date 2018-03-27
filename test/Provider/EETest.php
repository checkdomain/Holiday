<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class EETest
 */
class EETest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new EE();
    }

    /**
     * Provides some test dates and the expectation
     *
     * vendor/bin/phpunit --filter EETest
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

            array('2018-01-01', null, array('name' => 'uusaasta')),
            array('2018-02-24', null, array('name' => 'iseseisvuspäev')),
            array('2018-05-01', null, array('name' => 'kevadpüha')),
            array('2018-06-23', null, array('name' => 'võidupüha and jaanilaupäev')),
            array('2018-06-24', null, array('name' => 'võidupüha and jaanilaupäev')),
            array('2018-08-20', null, array('name' => 'taasiseseisvumispäev')),
            array('2018-12-24', null, array('name' => 'jõululaupäev')),
            array('2018-12-25', null, array('name' => 'esimene jõulupüha')),
            array('2018-12-26', null, array('name' => 'teine jõulupüha')),

            // Easter dates 2018
            array('2018-03-30', null, array('name' => 'suur reede')),
            array('2018-04-01', null, array('name' => 'ülestõusmispühade 1. püha')),
            array('2018-05-20', null, array('name' => 'nelipühade 1. püha')),

            // Easter dates 2019
            array('2019-04-19', null, array('name' => 'suur reede')),
            array('2019-04-21', null, array('name' => 'ülestõusmispühade 1. püha')),
            array('2019-06-09', null, array('name' => 'nelipühade 1. püha')),
        );
    }
}
