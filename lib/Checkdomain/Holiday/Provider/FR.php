<?php

namespace Checkdomain\Holiday\Provider;

/**
 * French holiday provider
 *
 * @author Vincent Touzet <vincent.touzet@gmail.com>
 * @since 2014-01-03
 */
class FR extends AbstractEaster
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
            '01-01' => $this->createData('Jour de l\'an', true),
            '05-01' => $this->createData('Fête du Travail', true),
            '05-08' => $this->createData('8 Mai 1945', true),
            '07-14' => $this->createData('Fête Nationale', true),
            '08-15' => $this->createData('Assomption', true),
            '11-01' => $this->createData('La Toussaint', true),
            '11-11' => $this->createData('Armistice', true),
            '12-25' => $this->createData('Noël', true),
            // Variable dates
            $easter['easterMonday']->format(self::DATE_FORMAT)    => $this->createData('Lundi de Pâques', true),
            $easter['ascensionDay']->format(self::DATE_FORMAT)    => $this->createData('Jeudi de l\'Ascension', true),
            $easter['pentecostMonday']->format(self::DATE_FORMAT)    => $this->createData('Lundi de Pentecôte', true),
        );

        return $holidays;
    }
}
