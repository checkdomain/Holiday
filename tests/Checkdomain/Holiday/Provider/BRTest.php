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
            // National Fixed
            array('2017-01-01', null, array('name' => 'Confraternização Universal')),
            array('2017-04-21', null, array('name' => 'Tiradentes')),
            array('2017-05-01', null, array('name' => 'Dia do Trabalhador')),
            array('2017-09-07', null, array('name' => 'Dia da Pátria')),
            array('2017-10-12', null, array('name' => 'Nossa Senhora Aparecida')),
            array('2017-11-02', null, array('name' => 'Finados')),
            array('2017-11-15', null, array('name' => 'Proclamação da República')),
            array('2017-12-25', null, array('name' => 'Natal')),
            // National Variable
            array('2016-02-09', null, array('name' => 'Carnaval')),
            array('2017-02-28', null, array('name' => 'Carnaval')),
            array('2018-02-13', null, array('name' => 'Carnaval')),
            array('2016-03-25', null, array('name' => 'Sexta-Feira Santa')),
            array('2017-04-14', null, array('name' => 'Sexta-Feira Santa')),
            array('2018-03-30', null, array('name' => 'Sexta-Feira Santa')),
            array('2016-05-26', null, array('name' => 'Corpus Christi')),
            array('2017-06-15', null, array('name' => 'Corpus Christi')),
            array('2018-05-31', null, array('name' => 'Corpus Christi')),
        );
    }
}
