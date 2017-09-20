<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class ATTest
 */
class ATTest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new AT();
    }

    /**
     * Provides some test dates and the expectation
     *
     * @return array
     */
    public function dateProvider()
    {
        return array(
            array('2013-01-01', null, array('name' => 'Neujahr')),
            array('2013-01-06', null, array('name' => 'Heilige Drei Könige')),
            array('2013-04-01', null, array('name' => 'Ostermontag')),
            array('2013-05-01', null, array('name' => 'Staatsfeiertag')),
            array('2013-05-09', null, array('name' => 'Christi Himmelfahrt')),
            array('2013-05-20', null, array('name' => 'Pfingstmontag')),
            array('2013-05-30', null, array('name' => 'Fronleichnam')),
            array('2013-08-15', null, array('name' => 'Mariä Himmelfahrt')),
            array('2013-10-26', null, array('name' => 'Nationalfeiertag')),
            array('2013-11-01', null, array('name' => 'Allerheiligen')),
            array('2013-12-08', null, array('name' => 'Mariä Empfängnis')),
            array('2013-12-25', null, array('name' => 'Weihnachten')),
            array('2013-12-26', null, array('name' => 'Stefanitag')),
            array('2015-01-01', null, array('name' => 'Neujahr')),
            array('2015-01-06', null, array('name' => 'Heilige Drei Könige')),
            array('2015-04-06', null, array('name' => 'Ostermontag')),
            array('2015-05-01', null, array('name' => 'Staatsfeiertag')),
            array('2015-05-14', null, array('name' => 'Christi Himmelfahrt')),
            array('2015-05-25', null, array('name' => 'Pfingstmontag')),
            array('2015-06-04', null, array('name' => 'Fronleichnam')),
            array('2015-08-15', null, array('name' => 'Mariä Himmelfahrt')),
            array('2015-10-26', null, array('name' => 'Nationalfeiertag')),
            array('2015-11-01', null, array('name' => 'Allerheiligen')),
            array('2015-12-08', null, array('name' => 'Mariä Empfängnis')),
            array('2015-12-25', null, array('name' => 'Weihnachten')),
            array('2015-12-26', null, array('name' => 'Stefanitag')),
        );
    }
}
