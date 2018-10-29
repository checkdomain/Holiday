<?php

namespace Checkdomain\Holiday\Provider;

use Checkdomain\Holiday\Helper\EasterUtil;

/**
 * French holiday provider
 *
 * @author Vincent Touzet <vincent.touzet@gmail.com>
 * @since 2014-01-03
 */
class FR extends AbstractProvider
{

    /**
     * @param int $year
     *
     * @return mixed
     */
    public function getHolidaysByYear($year)
    {
        $easter = new EasterUtil($year);

        $holidays = array(
            '01-01' => $this->createData('Jour de l\'an'),
            '05-01' => $this->createData('Fête du Travail'),
            '05-08' => $this->createData('8 Mai 1945'),
            '07-14' => $this->createData('Fête Nationale'),
            '08-15' => $this->createData('Assomption'),
            '11-01' => $this->createData('La Toussaint'),
            '11-11' => $this->createData('Armistice'),
            '12-25' => $this->createData('Noël'),
            // Variable dates
            $easter->getDate(EasterUtil::EASTER_MONDAY)    => $this->createData('Lundi de Pâques'),
            $easter->getDate(EasterUtil::ASCENSION_DAY)    => $this->createData('Jeudi de l\'Ascension'),
            $easter->getDate(EasterUtil::PENTECOST_MONDAY) => $this->createData('Lundi de Pentecôte'),
        );

        return $holidays;
    }
}
