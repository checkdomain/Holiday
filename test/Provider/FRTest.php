<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class FRTest
 */
class FRTest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new FR();
    }

    /**
     * Provides some test dates and the expectation
     *
     * @return array
     */
    public function dateProvider()
    {
        return array(
            array('2014-03-21', null, null),
            array('2014-01-01', null, array('name' => 'Jour de l\'an')),
            array('2014-04-21', null, array('name' => 'Lundi de Pâques')),
            array('2014-05-01', null, array('name' => 'Fête du Travail')),
            array('2014-05-08', null, array('name' => '8 Mai 1945')),
            array('2014-05-29', null, array('name' => 'Jeudi de l\'Ascension')),
            array('2014-06-09', null, array('name' => 'Lundi de Pentecôte')),
            array('2014-07-14', null, array('name' => 'Fête Nationale')),
            array('2014-08-15', null, array('name' => 'Assomption')),
            array('2014-11-01', null, array('name' => 'La Toussaint')),
            array('2014-11-11', null, array('name' => 'Armistice')),
            array('2014-12-25', null, array('name' => 'Noël')),
            array('2014-12-26', FR::STATE_AM, array('name' => 'Saint Etienne')),
            array('2014-04-18', FR::STATE_AM, array('name' => 'Vendredi Saint')),
        );
    }
} 
