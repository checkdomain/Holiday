<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class HUTest
 */
class HUTest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new HU();
    }

    /**
     * Provides some test dates and the expectation
     *
     * vendor/bin/phpunit --filter HUTest
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

            array('2018-01-01', null, array('name' => 'Újév')),
            array('2018-03-15', null, array('name' => 'Nemzeti ünnep')),
            array('2018-05-01', null, array('name' => 'A munka ünnepe')),
            array('2018-08-20', null, array('name' => 'Az államalapítás ünnepe')),
            array('2018-10-23', null, array('name' => 'Nemzeti ünnep')),
            array('2018-11-01', null, array('name' => 'Mindenszentek')),
            array('2018-12-25', null, array('name' => 'Karácsony')),
            array('2018-12-26', null, array('name' => 'Karácsony')),


            // Easter dates 2018
            array('2018-04-01', null, array('name' => 'Húsvétvasárnap')),
            array('2018-04-02', null, array('name' => 'Húsvéthétfő')),
            array('2018-05-20', null, array('name' => 'Pünkösdvasárnap')),
            array('2018-05-21', null, array('name' => 'Pünkösdhétfő')),

            // Easter dates 2019
            array('2019-04-21', null, array('name' => 'Húsvétvasárnap')),
            array('2019-04-22', null, array('name' => 'Húsvéthétfő')),
            array('2019-06-09', null, array('name' => 'Pünkösdvasárnap')),
            array('2019-06-10', null, array('name' => 'Pünkösdhétfő')),
        );
    }
}
