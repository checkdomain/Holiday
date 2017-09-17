<?php

namespace Checkdomain\Holiday\Provider;

use DateInterval;
use DateTimeImmutable;

/**
 * Brazilian holiday provider
 */
class BR extends AbstractEaster
{
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

        return $holidays;
    }
}
