<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class LVTest
 */
class LVTest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new LV();
    }

    /**
     * Provides some test dates and the expectation
     *
     * vendor/bin/phpunit --filter LVTest
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

            array('2018-01-01', null, array('name' => 'Jaunais Gads')),
            array('2018-05-01', null, array('name' => 'Darba svētki')),
            array('2018-05-04', null, array('name' => 'Latvijas Republikas Neatkarības atjaunošanas diena')),

            array('2018-06-23', null, array('name' => 'Līgo Diena')),
            array('2018-06-24', null, array('name' => 'Jāņi')),
            array('2018-11-18', null, array('name' => 'Latvijas Republikas proklamēšanas diena')),
            array('2018-12-24', null, array('name' => 'Ziemassvētku vakars')),
            array('2018-12-25', null, array('name' => 'Ziemassvētki')),
            array('2018-12-26', null, array('name' => 'Otrie Ziemassvētki')),
            array('2018-12-31', null, array('name' => 'Vecgada vakars')),

            // Mātes diena floating holiday (Second Sunday of May)
            array('2018-05-13', null, array('name' => 'Mātes diena')),

            // Easter dates 2018
            array('2018-03-30', null, array('name' => 'Lielā Piektdiena')),
            array('2018-04-01', null, array('name' => 'Lieldienas')),
            array('2018-04-02', null, array('name' => 'Otrās Lieldienas')),

            // Easter dates 2019
            array('2019-04-19', null, array('name' => 'Lielā Piektdiena')),
            array('2019-04-21', null, array('name' => 'Lieldienas')),
            array('2019-04-22', null, array('name' => 'Otrās Lieldienas')),
        );
    }
}
