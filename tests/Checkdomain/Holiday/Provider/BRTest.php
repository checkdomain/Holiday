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
            // Distrito Federal District Fixed
            array('2017-04-21', BR::STATE_DF, array('name' => 'Tiradentes')), // Fundação de Brasília
            array('2017-11-30', BR::STATE_DF, array('name' => 'Dia do Evangélico')),
            // Espírito Santo State (Without Holidays)
            array('2017-01-01', BR::STATE_ES, array('name' => 'Confraternização Universal')),
            // Goiás State (Without Holidays)
            array('2017-01-01', BR::STATE_GO, array('name' => 'Confraternização Universal')),
            // Maranhão State Fixed
            array('2017-07-28', BR::STATE_MA, array('name' => 'Adesão do Maranhão à Independência do Brasil')),
            // Mato Grosso State Fixed
            array('2017-11-20', BR::STATE_MT, array('name' => 'Dia da Consciência Negra')),
            // Mato Grosso do Sul State Fixed
            array('2017-10-11', BR::STATE_MS, array('name' => 'Criação do Estado')),
            // Minas Gerais State Fixed
            array('2017-04-21', BR::STATE_MG, array('name' => 'Tiradentes')), // Data Magna do Estado
            // Pará State Fixed
            array('2017-08-15', BR::STATE_PA, array('name' => 'Adesão do Grão-Pará à Independência do Brasil')),
            // Paraíba State Fixed
            array('2017-07-26', BR::STATE_PB, array('name' => 'Homenagem à Memória do Ex-Presidente João Pessoa')),
            array('2017-08-05', BR::STATE_PB, array('name' => 'Fundação do Estado')),
            // Paraná State Fixed
            array('2017-12-19', BR::STATE_PR, array('name' => 'Emancipação Política')),
            // Pernambuco State Variable
            array('2016-03-06', BR::STATE_PE, array('name' => 'Revolução Pernambucana')),
            array('2017-03-05', BR::STATE_PE, array('name' => 'Revolução Pernambucana')),
            array('2018-03-04', BR::STATE_PE, array('name' => 'Revolução Pernambucana')),
            // Piauí State Fixed
            array('2017-10-19', BR::STATE_PI, array('name' => 'Dia do Piauí')),
            // Rio de Janeiro State Fixed
            array('2017-04-23', BR::STATE_RJ, array('name' => 'São Jorge')),
            array('2017-11-20', BR::STATE_RJ, array('name' => 'Dia da Consciência Negra')),
            // Rio de Janeiro State Variable
            array('2016-02-09', BR::STATE_RJ, array('name' => 'Carnaval')),
            array('2017-02-28', BR::STATE_RJ, array('name' => 'Carnaval')),
            array('2018-02-13', BR::STATE_RJ, array('name' => 'Carnaval')),
            // Rio Grande do Norte State Fixed
            array('2017-10-03', BR::STATE_RN, array('name' => 'Mártires de Cunhaú e Uruaçu')),
            // Rio Grande do Sul State Fixed
            array('2017-09-20', BR::STATE_RS, array('name' => 'Proclamação da República Rio-Grandense')),
            // Rondônia State Fixed
            array('2017-01-04', BR::STATE_RO, array('name' => 'Criação do Estado')),
            array('2017-06-18', BR::STATE_RO, array('name' => 'Dia do Evangélico')),
            // Roraima State Fixed
            array('2017-10-05', BR::STATE_RR, array('name' => 'Criação do Estado')),
        );
    }
}
