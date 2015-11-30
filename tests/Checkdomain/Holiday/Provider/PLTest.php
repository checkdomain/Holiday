<?php
/**
 * Polish holiday provider
 *
 * @author Przemek Sztuczyński <psztuczynski@gmail.com>
 */
namespace Checkdomain\Holiday\Provider;

/**
 * Class ITTest
 * @package Checkdomain\Holiday\Provider
 */
class PLTest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new PL();
    }

    /**
     * Provides some test dates and the expectation
     *
     * @return array
     */
    public function dateProvider()
    {
        return array(
            array('01.01.2014', null, array('name' => 'Nowy Rok')),
            array('27.03.2016', null, array('name' => 'Wielkanoc')),
            array('28.03.2016', null, array('name' => 'Poniedziałek Wielkanocny')),
            array('25.12.2014', null, array('name' => 'Boże Narodzenie')),
            array('11.11.2013', null, array('name' => 'Święto Niepodległości')),
            array('04.06.2015', null, array('name' => 'Boże Ciało')),
            array('01.11.2018', null, array('name' => 'Wszystkich Świętych')),
            array('01.05.2015', null, array('name' => 'Święto Pracy')),
            array('26.12.2016', null, array('name' => 'Drugi dzień Bożego Narodzenia')),
            array('15.08.2016', null, array('name' => 'Wniebowzięcie Najświętszej Maryi Panny')),
        );
    }
}
