<?php
/**
 * Norwegian holiday provider
 * 
 * @author Kristian Lunde <kristian@klunde.net>
 * @since 2014-04-18
 */

namespace Checkdomain\Holiday\Provider;

/**
 * Class NO
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
            '01-01' => $this->createData('1. nyttårsdag', true),
            '05-01' => $this->createData('1. mai', true),
            '05-17' => $this->createData('Grunnlovsdagen', true),
            '12-25' => $this->createData('1. juledag', true),
            '12-26' => $this->createData('2. juledag', true),
            // Variable dates
			$easter['maundyThursday']->format(self::DATE_FORMAT)  => $this->createData('Skjærtorsdag', true),
            $easter['goodFriday']->format(self::DATE_FORMAT)      => $this->createData('Langfredag', true),
            $easter['easterSunday']->format(self::DATE_FORMAT)    => $this->createData('1. påskedag', true),
            $easter['easterMonday']->format(self::DATE_FORMAT)    => $this->createData('2. påskedag', true),
            $easter['ascensionDay']->format(self::DATE_FORMAT)    => $this->createData('Kristi Himmelfartsdag', true),
            $easter['pentecostMonday']->format(self::DATE_FORMAT) => $this->createData('2. pinsedag', true),
		);
    }
}
