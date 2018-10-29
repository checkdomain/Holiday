<?php

namespace Checkdomain\Holiday\Provider;

use Checkdomain\Holiday\Helper\EasterUtil;

/**
 * Norwegian holiday provider
 *
 * @author Kristian Lunde <kristian@klunde.net>
 * @since 2014-04-18
 **/
class NO extends AbstractProvider
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
            '01-01' => $this->createData('1. nyttårsdag'),
            '05-01' => $this->createData('1. mai'),
            '05-17' => $this->createData('Grunnlovsdagen'),
            '12-25' => $this->createData('1. juledag'),
            '12-26' => $this->createData('2. juledag'),
            // Variable dates
            $easter->getDate(EasterUtil::MAUNDY_THURSDAY)  => $this->createData('Skjærtorsdag'),
            $easter->getDate(EasterUtil::GOOD_FRIDAY)      => $this->createData('Langfredag'),
            $easter->getDate(EasterUtil::EASTER_SUNDAY)    => $this->createData('1. påskedag'),
            $easter->getDate(EasterUtil::EASTER_MONDAY)    => $this->createData('2. påskedag'),
            $easter->getDate(EasterUtil::ASCENSION_DAY)    => $this->createData('Kristi Himmelfartsdag'),
            $easter->getDate(EasterUtil::PENTECOST_MONDAY) => $this->createData('2. pinsedag'),
		);
    }
}
