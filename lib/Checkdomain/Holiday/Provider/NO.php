<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Norwegian holiday provider
 *
 * @author Kristian Lunde <kristian@klunde.net>
 * @since 2014-04-18
 **/
class NO extends AbstractEaster
{
    /**
     * @param int $year
     *
     * @return mixed
     */
    public function getHolidaysDataByYear($year)
    {
        $easter = $this->getEasterDates($year);

        return array(
            '01-01' => $this->createData('1. nyttårsdag'),
            '05-01' => $this->createData('1. mai'),
            '05-17' => $this->createData('Grunnlovsdagen'),
            '12-25' => $this->createData('1. juledag'),
            '12-26' => $this->createData('2. juledag'),

            // Variable dates
			$easter[self::MAUNDY_THURSDAY]->format(self::DATE_FORMAT)  => $this->createData('Skjærtorsdag'),
            $easter[self::GOOD_FRIDAY]->format(self::DATE_FORMAT)      => $this->createData('Langfredag'),
            $easter[self::EASTER_SUNDAY]->format(self::DATE_FORMAT)    => $this->createData('1. påskedag'),
            $easter[self::EASTER_MONDAY]->format(self::DATE_FORMAT)    => $this->createData('2. påskedag'),
            $easter[self::ASCENSION_DAY]->format(self::DATE_FORMAT)    => $this->createData('Kristi Himmelfartsdag'),
            $easter[self::PENTECOST_MONDAY]->format(self::DATE_FORMAT) => $this->createData('2. pinsedag'),
		);
    }
}
