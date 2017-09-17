<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class BRTest */ class BRTest extends AbstractTest
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
            // Acre State Fixed
            array('2017-01-23', BR::STATE_AC, array('name' => 'Dia do Evangélico')),
            array('2017-03-08', BR::STATE_AC, array('name' => 'Alusivo ao Dia Internacional da Mulher')),
            array('2016-06-15', BR::STATE_AC, array('name' => 'Aniversário do Estado')), // conflicts: 2017-06-15
            array('2017-09-05', BR::STATE_AC, array('name' => 'Feriado Estadual')),
            array('2017-11-17', BR::STATE_AC, array('name' => 'Assinatura do Tratado de Petrópolis')),
            // Alagoas State Fixed
            array('2017-06-24', BR::STATE_AL, array('name' => 'São João')),
            array('2017-06-29', BR::STATE_AL, array('name' => 'São Pedro')),
            array('2017-09-16', BR::STATE_AL, array('name' => 'Emancipação Política')),
            array('2017-11-20', BR::STATE_AL, array('name' => 'Dia da Consciência Negra')),
            // Amapá State Fixed
            array('2017-03-19', BR::STATE_AP, array('name' => 'São José')),
            array('2017-09-13', BR::STATE_AP, array('name' => 'Criação do Território Federal')),
            // Amazonas State Fixed
            array('2017-09-05', BR::STATE_AM, array('name' => 'Feriado Estadual')),
            array('2017-11-20', BR::STATE_AM, array('name' => 'Dia da Consciência Negra')),
            // Bahia State Fixed
            array('2017-07-02', BR::STATE_BA, array('name' => 'Independência da Bahia')),
            // Ceará State Fixed
            array('2017-03-25', BR::STATE_CE, array('name' => 'Data da Abolição da Escravidão no Ceará')),
        );
    }
}
