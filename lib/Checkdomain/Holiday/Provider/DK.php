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
            '01-01' => $this->createData('Nytår', true),
            '12-25' => $this->createData('1. Juledag', true),
            '12-26' => $this->createData('2. Juledag', true),

            // Variable dates
            $easter['maundyThursday']->format(self::DATE_FORMAT)  => $this->createData('Skærtorsdag', true),
            $easter['goodFriday']->format(self::DATE_FORMAT)      => $this->createData('Langfredag', true),
            $easter['easterSunday']->format(self::DATE_FORMAT)    => $this->createData('Påskedag', true),
            $easter['easterMonday']->format(self::DATE_FORMAT)    => $this->createData('2. Påskedag', true),
            $greatPrayerDay->format(self::DATE_FORMAT)            => $this->createData('Store Bededag', true),
            $easter['ascensionDay']->format(self::DATE_FORMAT)    => $this->createData('Kristi Himmelfartsdag', true),
            $easter['pentecostSunday']->format(self::DATE_FORMAT) => $this->createData('Pinsedag', true),
            $easter['pentecostMonday']->format(self::DATE_FORMAT) => $this->createData('2. Pinsedag', true)
        );

        return $holidays;
    }
}
