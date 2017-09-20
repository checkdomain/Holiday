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
            array('2010-01-01', null, array('name' => 'Ano Novo')),

            array('2013-05-26', null, null),
            array('2013-04-25', null, array('name' => '25 de Abril')),

            array('2014-10-05', null, null),
            array('2014-05-01', null, array('name' => 'Dia do Trabalhador')),

            array('2015-12-01', null, null),
            array('2015-08-15', null, array('name' => 'Assunção de Nossa Senhora')),

            array('2016-01-02', null, null),
            array('2016-11-01', null, array('name' => 'Dia de Todos os Santos')),
            array('2016-12-25', null, array('name' => 'Natal')),

            array('2017-09-03', null, null),
            array('2017-12-01', null, array('name' => 'Restauração da Independência')),
            array('2017-06-10', null, array('name' => 'Dia de Portugal')),
        );
    }
}
