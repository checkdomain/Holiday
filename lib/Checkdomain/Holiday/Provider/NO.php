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
    public function getHolidaysByYear($year)
    {
        $easter = $this->getEasterDates($year);

        return array(
            '01-01' => $this->createData('1. nyttårsdag'),
            '05-01' => $this->createData('1. mai'),
            '05-17' => $this->createData('Grunnlovsdagen'),
            '12-25' => $this->createData('1. juledag'),
            '12-26' => $this->createData('2. juledag'),
            // Variable dates
			$easter['maundyThursday']->format(self::DATE_FORMAT)  => $this->createData('Skjærtorsdag'),
            $easter['goodFriday']->format(self::DATE_FORMAT)      => $this->createData('Langfredag'),
            $easter['easterSunday']->format(self::DATE_FORMAT)    => $this->createData('1. påskedag'),
            $easter['easterMonday']->format(self::DATE_FORMAT)    => $this->createData('2. påskedag'),
            $easter['ascensionDay']->format(self::DATE_FORMAT)    => $this->createData('Kristi Himmelfartsdag'),
            $easter['pentecostMonday']->format(self::DATE_FORMAT) => $this->createData('2. pinsedag'),
		);
    }
}
