<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class DE
 */
class ATTest extends AbstractTest
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
            array('01.01.2013', null, array('name' => 'Neujahr')),
            array('06.01.2013', null, array('name' => 'Heilige Drei Könige')),
            array('01.04.2013', null, array('name' => 'Ostermontag')),
            array('01.05.2013', null, array('name' => 'Staatsfeiertag')),
            array('09.05.2013', null, array('name' => 'Christi Himmelfahrt')),
            array('20.05.2013', null, array('name' => 'Pfingstmontag')),
            array('30.05.2013', null, array('name' => 'Fronleichnam')),
            array('15.08.2013', null, array('name' => 'Mariä Himmelfahrt')),
            array('26.10.2013', null, array('name' => 'Nationalfeiertag')),
            array('01.11.2013', null, array('name' => 'Allerheiligen')),
            array('08.12.2013', null, array('name' => 'Mariä Empfängnis')),
            array('25.12.2013', null, array('name' => 'Weihnachten')),
            array('26.12.2013', null, array('name' => 'Stefanitag')),
            array('01.01.2015', null, array('name' => 'Neujahr')),
            array('06.01.2015', null, array('name' => 'Heilige Drei Könige')),
            array('06.04.2015', null, array('name' => 'Ostermontag')),
            array('01.05.2015', null, array('name' => 'Staatsfeiertag')),
            array('14.05.2015', null, array('name' => 'Christi Himmelfahrt')),
            array('25.05.2015', null, array('name' => 'Pfingstmontag')),
            array('04.06.2015', null, array('name' => 'Fronleichnam')),
            array('15.08.2015', null, array('name' => 'Mariä Himmelfahrt')),
            array('26.10.2015', null, array('name' => 'Nationalfeiertag')),
            array('01.11.2015', null, array('name' => 'Allerheiligen')),
            array('08.12.2015', null, array('name' => 'Mariä Empfängnis')),
            array('25.12.2015', null, array('name' => 'Weihnachten')),
            array('26.12.2015', null, array('name' => 'Stefanitag')),
        );
    }
}
