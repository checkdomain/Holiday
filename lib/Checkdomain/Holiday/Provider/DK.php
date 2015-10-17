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
    public function getHolidaysDataByYear($year)
    {
        $easter = $this->getEasterDates($year);

        $greatPrayerDay = clone $easter['easterSunday'];
        $greatPrayerDay->modify('+26 days');

        $holidays = array(
            '01-01' => $this->createData('Nytår'),
            '12-25' => $this->createData('1. Juledag'),
            '12-26' => $this->createData('2. Juledag'),

            // Variable dates
            $easter[self::MAUNDY_THURSDAY]->format(self::DATE_FORMAT)  => $this->createData('Skærtorsdag'),
            $easter[self::GOOD_FRIDAY]->format(self::DATE_FORMAT)      => $this->createData('Langfredag'),
            $easter[self::EASTER_SUNDAY]->format(self::DATE_FORMAT)    => $this->createData('Påskedag'),
            $easter[self::EASTER_MONDAY]->format(self::DATE_FORMAT)    => $this->createData('2. Påskedag'),
            $greatPrayerDay->format(self::DATE_FORMAT)            => $this->createData('Store Bededag'),
            $easter[self::ASCENSION_DAY]->format(self::DATE_FORMAT)    => $this->createData('Kristi Himmelfartsdag'),
            $easter[self::PENTECOST_SUNDAY]->format(self::DATE_FORMAT) => $this->createData('Pinsedag'),
            $easter[self::PENTECOST_MONDAY]->format(self::DATE_FORMAT) => $this->createData('2. Pinsedag')
        );

        return $holidays;
    }
}
