<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Denmark holiday provider
 *
 * @author Florian Körner <contact@florian-koerner.com>
 * @since 2015-10-15
 */
class DK extends AbstractEaster
{
    /**
     * @param int $year
     *
     * @return mixed
     */
    public function getHolidaysByYear($year)
    {
        $easter = $this->getEasterDates($year);

        $greatPrayerDay = clone $easter['easterSunday'];
        $greatPrayerDay->modify('+26 days');

        $holidays = array(
            '01-01' => $this->createData('Nytår'),
            '12-25' => $this->createData('1. Juledag'),
            '12-26' => $this->createData('2. Juledag'),

            // Variable dates
            $easter['maundyThursday']->format(self::DATE_FORMAT)  => $this->createData('Skærtorsdag'),
            $easter['goodFriday']->format(self::DATE_FORMAT)      => $this->createData('Langfredag'),
            $easter['easterSunday']->format(self::DATE_FORMAT)    => $this->createData('Påskedag'),
            $easter['easterMonday']->format(self::DATE_FORMAT)    => $this->createData('2. Påskedag'),
            $greatPrayerDay->format(self::DATE_FORMAT)            => $this->createData('Store Bededag'),
            $easter['ascensionDay']->format(self::DATE_FORMAT)    => $this->createData('Kristi Himmelfartsdag'),
            $easter['pentecostSunday']->format(self::DATE_FORMAT) => $this->createData('Pinsedag'),
            $easter['pentecostMonday']->format(self::DATE_FORMAT) => $this->createData('2. Pinsedag')
        );

        return $holidays;
    }
}
