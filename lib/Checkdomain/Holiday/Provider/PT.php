<?php

namespace Checkdomain\Holiday\Provider;


/**
 * Portugal holiday provider
 *
 * @author jose reis
 * @since 2014-01-03
 */

use Exception;

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
            '01-01' => $this->createData('Dia de Ano Novo'),
            '04-25' => $this->createData('Dia da Liberdade 25 de Abril'),
            '05-01' => $this->createData('Dia do Trabalhador'),
            '06-10' => $this->createdata('Dia de Portugal'),
            '08-15' => $this->createdata('Assunção de Nossa Senhora'),
            '10-05' => $this->createdata('Implantação da República'),
            '11-01' => $this->createdata('Todos os Santos'),
            '12-01' => $this->createdata('1.º de Dezembro'),
            '12-08' => $this->createdata('Dia da Imaculada Conceição'),
            '12-25' => $this->createData('Natal'),
            // Variable dates
            $easter['easterSunday']->format(self::DATE_FORMAT)    => $this->createData('Páscoa'),
            $easter['goodFriday']->format(self::DATE_FORMAT)    => $this->createData('Sexta-Feira Santa'),
            $easter['corpusChristi']->format(self::DATE_FORMAT)    => $this->createData('Corpo de Deus'),
        );

        return $holidays;
    }


    public function getHolidaysByYearLocation($year, $loc = 'lisboa')
    {
        $holidays = $this->getHolidaysByYear($year);
        $method = 'get'.ucfirst($loc).'Holidays';

        if ( !method_exists( $this, $method ) ){
            throw new Exception("Can't find $loc Holidays", 1);
        }

        return array_merge($holidays, $this->$method);
    }

    //
    //Privates
    //
    private function getLisboaHolidays(){
        $holidays = array(
            '09-13' => $this->createData('Dia de Santo António'),
        );
        return $holidays;
    }
}