<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class PTTest
 *
 * @todo test local date
 */
class PTTest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new PT();
    }

    /**
     * Provides some test dates and the expectation
     *
     * @return array
     */
    public function dateProvider()
    {
        return array(
            array('05.01.2016', null, null),  
            array('01.01.2016', null, array('name' => 'Dia de Ano Novo')),
            array('25.03.2016', null, array('name' => 'Sexta-Feira Santa')),
            array('27.03.2016', null, array('name' => 'Páscoa')),
            array('25.04.2016', null, array('name' => 'Dia da Liberdade 25 de Abril')),
            array('01.05.2016', null, array('name' => 'Dia do Trabalhador')),
            array('26.05.2016', null, array('name' => 'Corpo de Deus')),
            array('10.06.2016', null, array('name' => 'Dia de Portugal')),
            array('15.08.2016', null, array('name' => 'Assunção de Nossa Senhora')),
            array('05.10.2016', null, array('name' => 'Implantação da República')),
            array('01.11.2016', null, array('name' => 'Todos os Santos')),
            array('01.12.2016', null, array('name' => '1.º de Dezembro')),
            array('08.12.2016', null, array('name' => 'Dia da Imaculada Conceição')),
            array('25.12.2016', null, array('name' => 'Natal')),
            array('30.05.2013', null, null),  
        );
    }
} 
