<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Portugal holiday provider
 *
 * @author Tiago Carvalho <tiago.carvalho@beubi.com>
 */
class PT extends AbstractEaster
{

    /**
     * @param int $year
     *
     * @return mixed
     */
    public function getHolidaysByYear($year)
    {
        $easter = $this->getEasterDates($year);

        $holidays = array(
            '01-01' => $this->createData('Ano Novo'),
            '04-25' => $this->createData('25 de Abril'),
            '05-01' => $this->createData('Dia do Trabalhador'),
            '06-10' => $this->createData('Dia de Portugal'),
            '06-15' => $this->createData('Corpo de Deus'),
            '08-15' => $this->createData('Assunção de Nossa Senhora'),
            '10-05' => $this->createData('Implantação da República'),
            '11-01' => $this->createData('Dia de Todos os Santos'),
            '12-01' => $this->createData('Restauração da Independência'),
            '12-08' => $this->createData('Dia da Imaculada Conceição'),
            '12-25' => $this->createData('Natal'),
            // Variable dates
            $easter['goodFriday']->format(self::DATE_FORMAT)    => $this->createData('Sexta-Feira Santa'),
            $easter['easterSunday']->format(self::DATE_FORMAT)    => $this->createData('Páscoa'),
        );

        return $holidays;
    }
}
