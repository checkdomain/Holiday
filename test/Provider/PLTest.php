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
            array('2014-01-01', null, array('name' => 'Nowy Rok')),
            array('2016-03-27', null, array('name' => 'Wielkanoc')),
            array('2016-03-28', null, array('name' => 'Poniedziałek Wielkanocny')),
            array('2014-12-25', null, array('name' => 'Boże Narodzenie')),
            array('2013-11-11', null, array('name' => 'Święto Niepodległości')),
            array('2015-06-04', null, array('name' => 'Boże Ciało')),
            array('2018-11-01', null, array('name' => 'Wszystkich Świętych')),
            array('2015-05-01', null, array('name' => 'Święto Pracy')),
            array('2016-12-26', null, array('name' => 'Drugi dzień Bożego Narodzenia')),
            array('2016-08-15', null, array('name' => 'Wniebowzięcie Najświętszej Maryi Panny')),
            array('2019-06-09', null, array('name' => 'Zielone Świątki')),
            array('2020-05-31', null, array('name' => 'Zielone Świątki')),
        );
    }
}
