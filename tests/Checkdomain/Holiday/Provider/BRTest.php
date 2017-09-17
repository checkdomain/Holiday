<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class BRTest
 */
class BRTest extends AbstractTest
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->provider = new BR();
    }

    /**
     * Provides some test dates and the expectation
     *
     * @return array
     */
    public function dateProvider()
    {
        return array(
            array('2017-01-01', null, array('name' => 'Confraternização Universal')),
            array('2017-04-21', null, array('name' => 'Tiradentes')),
            array('2017-05-01', null, array('name' => 'Dia do Trabalhador')),
            array('2017-09-07', null, array('name' => 'Dia da Pátria')),
            array('2017-10-12', null, array('name' => 'Nossa Senhora Aparecida')),
            array('2017-11-02', null, array('name' => 'Finados')),
            array('2017-11-15', null, array('name' => 'Proclamação da República')),
            array('2017-12-25', null, array('name' => 'Natal')),
        );
    }
}
