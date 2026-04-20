<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class ESTest
 */
class ESTest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new ES();
    }

    /**
     * Provides some test dates and the expectation
     *
     * @return array
     */
    public function dateProvider()
    {
        return array(
            array('2020-01-01', null, array('name' => 'Año Nuevo')),
            array('2020-01-06', null, array('name' => 'Epifanía')),
            array('2020-04-10', null, array('name' => 'Viernes Santo')),
            array('2021-04-02', null, array('name' => 'Viernes Santo')),
            array('2020-05-01', null, array('name' => 'Fiesta del Trabajo')),
            array('2020-08-15', null, array('name' => 'Asunción de la Virgen Maria')),
            array('2020-10-12', null, array('name' => 'Fiesta Nacional de España')),
            array('2020-11-01', null, array('name' => 'Todos los Santos')),
            array('2020-12-06', null, array('name' => 'Día de la Constitución')),
            array('2020-12-08', null, array('name' => 'La Inmaculada Concepción')),
            array('2020-12-25', null, array('name' => 'Navidad del Señor')),
            array('2020-12-26', null, array('name' => 'San Esteban')),

            array('2020-02-28', ES::STATE_AN, array('name' => 'Día de la comunidad')),
            array('2020-04-23', ES::STATE_AR, array('name' => 'Día de la comunidad')),
            array('2020-04-23', ES::STATE_CA, array('name' => 'Día de la comunidad')),
            array('2020-04-23', ES::STATE_CL, array('name' => 'Día de la comunidad')),
            array('2020-03-01', ES::STATE_IB, array('name' => 'Día de la comunidad')),
            array('2020-05-02', ES::STATE_MA, array('name' => 'Día de la comunidad')),
            array('2020-05-30', ES::STATE_IC, array('name' => 'Día de la comunidad')),
            array('2020-05-31', ES::STATE_CM, array('name' => 'Día de la comunidad')),
            array('2020-06-09', ES::STATE_LR, array('name' => 'Día de la comunidad')),
            array('2020-06-09', ES::STATE_MU, array('name' => 'Día de la comunidad')),
            array('2020-09-02', ES::STATE_CE, array('name' => 'Día de la comunidad')),
            array('2020-09-08', ES::STATE_EX, array('name' => 'Día de la comunidad')),
            array('2020-09-08', ES::STATE_PA, array('name' => 'Día de la comunidad')),
            array('2020-09-11', ES::STATE_CA, array('name' => 'Día de la comunidad')),
            array('2020-09-15', ES::STATE_CN, array('name' => 'Día de la comunidad')),
            array('2020-10-09', ES::STATE_CV, array('name' => 'Día de la comunidad')),

            array('2020-03-19', ES::STATE_CM, array('name' => 'San José')),
            array('2020-03-19', ES::STATE_CV, array('name' => 'San José')),
            array('2020-03-19', ES::STATE_GA, array('name' => 'San José')),
            array('2020-03-19', ES::STATE_IB, array('name' => 'San José')),
            array('2020-03-19', ES::STATE_MA, array('name' => 'San José')),
            array('2020-03-19', ES::STATE_ME, array('name' => 'San José')),
            array('2020-03-19', ES::STATE_MU, array('name' => 'San José')),
            array('2020-03-19', ES::STATE_PA, array('name' => 'San José')),

            array('2020-05-17', ES::STATE_GA, array('name' => 'Día das Letras Galegas')),

            array('2020-07-25', ES::STATE_GA, array('name' => 'Santiago Apóstol')),
            array('2020-07-25', ES::STATE_MA, array('name' => 'Santiago Apóstol')),

            array('2020-10-25', ES::STATE_PV, array('name' => 'Euskadi Eguna')),

            array('2021-04-05', ES::STATE_CA, array('name' => 'Lunes de Pascua')),
            array('2021-04-05', ES::STATE_CV, array('name' => 'Lunes de Pascua')),
            array('2021-04-05', ES::STATE_IB, array('name' => 'Lunes de Pascua')),
            array('2021-04-05', ES::STATE_PV, array('name' => 'Lunes de Pascua')),
            array('2021-04-05', ES::STATE_CA, array('name' => 'Lunes de Pascua')),
            array('2021-04-05', ES::STATE_CV, array('name' => 'Lunes de Pascua')),
            array('2021-04-05', ES::STATE_IB, array('name' => 'Lunes de Pascua')),
            array('2021-04-05', ES::STATE_PV, array('name' => 'Lunes de Pascua')),

            array('2020-06-11', ES::STATE_MA, array('name' => 'Corpus Cristi')),
        );
    }
}
