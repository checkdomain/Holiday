<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class BETest
 */
class BETest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new BE();
    }

    /**
     * Provides some test dates and the expectation
     *
     * @return array
     */
    public function dateProvider()
    {
        return array(
            array('2017-03-21', null, null),
            array('2017-01-01', null, array('name' => 'Jour de l\'an')),
            array('2017-04-17', null, array('name' => 'Lundi de Pâques')),
            array('2017-05-01', null, array('name' => 'Fête du Travail')),
            array('2017-05-09', null, null),
            array('2017-05-25', null, array('name' => 'Jeudi de l\'Ascension')),
            array('2017-06-05', null, array('name' => 'Lundi de Pentecôte')),
            array('2017-07-21', null, array('name' => 'Fête Nationale')),
            array('2017-08-15', null, array('name' => 'Assomption')),
            array('2017-11-01', null, array('name' => 'Toussaint')),
            array('2017-11-11', null, array('name' => 'Armistice')),
            array('2017-12-25', null, array('name' => 'Noël')),
        );
    }
}
