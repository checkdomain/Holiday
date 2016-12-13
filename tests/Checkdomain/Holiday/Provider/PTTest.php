<?php
/**
 * Portuguese holiday provider
 *
 * @author Tiago Carvalho <tiago.carvalho@beubi.com>
 */
namespace Checkdomain\Holiday\Provider;

/**
 * Class PTTest
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
			      array('01.01.2010', null, array('name' => 'Ano Novo')),

            array('26.05.2013', null, null),
            array('25.04.2013', null, array('name' => '25 de Abril')),

            array('05.10.2014', null, null),
            array('01.05.2014', null, array('name' => 'Dia do Trabalhador')),

            array('01.12.2015', null, null),
            array('15.08.2015', null, array('name' => 'Santo Stefano')),

            array('01.01.2016', null, null),
            array('01.11.2016', null, array('name' => 'Dia de Todos os Santos')),
            array('25.12.2016', null, array('name' => 'Natal')),

            array('03.09.2017', null, null),
            array('01.12.2017', null, array('name' => 'Restauração da Independência')),
            array('10.06.2017', null, array('name' => 'Dia de Portugal')),
        );
    }
}
