<?php

namespace Checkdomain\Holiday\Provider;

use Checkdomain\Holiday\Helper\EasterUtil;

/**
 * Polish holiday provider
 *
 * @author Przemek Sztuczyński <psztuczynski@gmail.com>
 **/
class PL extends AbstractProvider
{

    /**
     * @param int $year
     *
     * @return mixed
     */
    public function getHolidaysByYear($year)
    {
        $easter = new EasterUtil($year);

        return array(
            '01-01' => $this->createData('Nowy Rok'),
            '01-06' => $this->createData('Trzech Króli'),
            '05-01' => $this->createData('Święto Pracy'),
            '05-03' => $this->createData('Święto Konstytucji Trzeciego Maja'),
            '08-15' => $this->createData('Wniebowzięcie Najświętszej Maryi Panny'),
            '11-01' => $this->createData('Wszystkich Świętych'),
            '11-11' => $this->createData('Święto Niepodległości'),
            '12-25' => $this->createData('Boże Narodzenie'),
            '12-26' => $this->createData('Drugi dzień Bożego Narodzenia'),

            // Variable dates
            $easter->getDate(EasterUtil::EASTER_SUNDAY)    => $this->createData('Wielkanoc'),
            $easter->getDate(EasterUtil::EASTER_MONDAY)    => $this->createData('Poniedziałek Wielkanocny'),
            $easter->getDate(EasterUtil::CORPUS_CHRISTI)    => $this->createData('Boże Ciało'),
            $easter->getDate(EasterUtil::PENTECOST_SUNDAY)    => $this->createData('Zielone Świątki'),
        );
    }
}
