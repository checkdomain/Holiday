<?php

namespace Checkdomain\Holiday\Provider;

use DateInterval;
use DateTimeImmutable;

/**
 * Brazilian holiday provider
 */
class BR extends AbstractEaster
{
    const STATE_AC = 'Acre';
    const STATE_AL = 'Alagoas';
    const STATE_AP = 'Amapá';
    const STATE_AM = 'Amazonas';
    const STATE_BA = 'Bahia';
    const STATE_CE = 'Ceará';
    const STATE_DF = 'Distrito Federal'; // TODO District or State?
    const STATE_ES = 'Espírito Santo';
    const STATE_GO = 'Goiás';
    const STATE_MA = 'Maranhão';
    const STATE_MT = 'Mato Grosso';
    const STATE_MS = 'Mato Grosso do Sul';
    const STATE_MG = 'Minas Gerais';
    const STATE_PA = 'Pará';
    const STATE_PB = 'Paraíba';
    const STATE_PR = 'Paraná';

    /**
     * {@inheritdoc}
     */
    public function getHolidaysByYear($year)
    {
        // Easter
        $easterDates  = $this->getEasterDates($year);
        $easterSunday = DateTimeImmutable::createFromMutable($easterDates['easterSunday']);

        /**
         * @see http://www.planalto.gov.br/ccivil_03/leis/L0662.htm
         * @see http://www.planalto.gov.br/ccivil_03/leis/l6802.htm
         * @see https://pt.wikipedia.org/wiki/Feriados_no_Brasil
         */
        $holidays = array(
            // National Fixed
            '01-01' => $this->createData('Confraternização Universal'),
            '04-21' => $this->createData('Tiradentes'),
            '05-01' => $this->createData('Dia do Trabalhador'),
            '09-07' => $this->createData('Dia da Pátria'),
            '10-12' => $this->createData('Nossa Senhora Aparecida'),
            '11-02' => $this->createData('Finados'),
            '11-15' => $this->createData('Proclamação da República'),
            '12-25' => $this->createData('Natal'),
            // National Variable
            $easterSunday->sub(new DateInterval('P47D'))->format(self::DATE_FORMAT) => $this->createData('Carnaval'),
            $easterSunday->sub(new DateInterval('P2D'))->format(self::DATE_FORMAT)  => $this->createData('Sexta-Feira Santa'),
            $easterSunday->add(new DateInterval('P60D'))->format(self::DATE_FORMAT) => $this->createData('Corpus Christi'),
        );

        // Acre State Fixed
        $this->setHolidayForState($holidays, '01-23', self::STATE_AC, 'Dia do Evangélico');
        $this->setHolidayForState($holidays, '03-08', self::STATE_AC, 'Alusivo ao Dia Internacional da Mulher');
        $this->setHolidayForState($holidays, '06-15', self::STATE_AC, 'Aniversário do Estado');
        $this->setHolidayForState($holidays, '09-05', self::STATE_AC, 'Feriado Estadual'); // Dia da Amazônia
        $this->setHolidayForState($holidays, '11-17', self::STATE_AC, 'Assinatura do Tratado de Petrópolis');

        // Alagoas State Fixed
        $this->setHolidayForState($holidays, '06-24', self::STATE_AL, 'São João');
        $this->setHolidayForState($holidays, '06-29', self::STATE_AL, 'São Pedro');
        $this->setHolidayForState($holidays, '09-16', self::STATE_AL, 'Emancipação Política');
        $this->setHolidayForState($holidays, '11-20', self::STATE_AL, 'Dia da Consciência Negra');

        // Amapá State Fixed
        $this->setHolidayForState($holidays, '03-19', self::STATE_AP, 'São José');
        $this->setHolidayForState($holidays, '09-13', self::STATE_AP, 'Criação do Território Federal');

        // Amazonas State Fixed
        $this->setHolidayForState($holidays, '09-05', self::STATE_AM, 'Feriado Estadual'); // Elevação do Amazonas à Categoria de Província
        $this->setHolidayForState($holidays, '11-20', self::STATE_AM, 'Dia da Consciência Negra');

        // Bahia State Fixed
        $this->setHolidayForState($holidays, '07-02', self::STATE_BA, 'Independência da Bahia');

        // Ceará State Fixed
        $this->setHolidayForState($holidays, '03-25', self::STATE_CE, 'Data da Abolição da Escravidão no Ceará');

        // Distrito Federal District Fixed
        $this->setHolidayForState($holidays, '04-21', self::STATE_DF, 'Fundação de Brasília');
        $this->setHolidayForState($holidays, '11-30', self::STATE_DF, 'Dia do Evangélico');

        // Espírito Santo State (Without Holidays)

        // Goiás State (Without Holidays)

        // Maranhão State Fixed
        $this->setHolidayForState($holidays, '07-28', self::STATE_MA, 'Adesão do Maranhão à Independência do Brasil');

        // Mato Grosso State Fixed
        $this->setHolidayForState($holidays, '11-20', self::STATE_MT, 'Dia da Consciência Negra');

        // Mato Grosso do Sul State Fixed
        $this->setHolidayForState($holidays, '10-11', self::STATE_MS, 'Criação do Estado');

        // Minas Gerais State Fixed
        $this->setHolidayForState($holidays, '04-21', self::STATE_MG, 'Data Magna do Estado');

        // Pará State Fixed
        $this->setHolidayForState($holidays, '08-15', self::STATE_PA, 'Adesão do Grão-Pará à Independência do Brasil');

        // Paraíba State Fixed
        $this->setHolidayForState($holidays, '07-26', self::STATE_PB, 'Homenagem à Memória do Ex-Presidente João Pessoa');
        $this->setHolidayForState($holidays, '08-05', self::STATE_PB, 'Fundação do Estado');

        // Paraná State Fixed
        $this->setHolidayForState($holidays, '12-19', self::STATE_PR, 'Emancipação Política');

        return $holidays;
    }

    /**
     * Set Holiday for State
     *
     * This method was created because Brazilian national holidays may conflict with state holidays. For example,
     * "2017-06-15" is a national variable holiday called "Corpus Christi", and is an Acre state fixed holiday called
     * "Aniversário do Estado". In these cases, national holiday will be consider more important.
     *
     * @param  array  $holidays Holidays Dataset
     * @param  string $day      Day
     * @param  string $state    State Name
     * @param  string $name     Holiday Name
     */
    private function setHolidayForState(&$holidays, $day, $state, $name)
    {
        // Exists?
        if (! array_key_exists($day, $holidays)) {
            // Initialized as State Holiday
            $holidays[$day] = $this->createData($name, []);
        }
        // Is a state holiday?
        if (is_array($holidays[$day]['states'])) {
            // Include Current State
            $holidays[$day]['states'][] = $state;
        }
    }
}
