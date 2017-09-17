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
        $this->setHolidayForState($holidays, '09-05', self::STATE_AC, 'Dia da Amazônia');
        $this->setHolidayForState($holidays, '11-17', self::STATE_AC, 'Assinatura do Tratado de Petrópolis');

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
