<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class Easter
 */
abstract class AbstractEaster extends AbstractProvider
{
    /**
     * Creating easter sunday
     *
     * @param $year
     * @return \DateTime
     */
    private function createSunday($year)
    {
        $easterSunday = new \DateTime('21.03.' . $year);
        $easterSunday->modify(sprintf('+%d days', easter_days($year)));

        return $easterSunday;
    }

    /**
     * Creating Orthodox easter sunday
     *
     * @param $year
     * @return \DateTime
     */
    private function createOrthodoxSunday($year)
    {
        $a = $year % 4;
        $b = $year % 7;
        $c = $year % 19;
        $d = (19 * $c + 15) % 30;
        $e = (2 * $a + 4 * $b - $d + 34) % 7;
        $month = floor(($d + $e + 114) / 31);
        $day = (($d + $e + 114) % 31) + 1;

        $sunday = mktime(0, 0, 0, $month, $day + 13, $year);

        return new \DateTime(date('Y-m-d', $sunday));
    }

    /**
     * Returns all dates calculated by easter sunday
     *
     * @param int $year
     * @param boolean $orthodox
     *
     * @return \DateTime[]
     */
    protected function getEasterDates($year, $orthodox = false)
    {
        $easterSunday = $orthodox ? $this->createOrthodoxSunday($year) :  $this->createSunday($year);

        $easterSunday->setTimezone(new \DateTimeZone(date_default_timezone_get()));

        $easterMonday = clone $easterSunday;
        $easterMonday->modify('+1 day');
        $maundyThursday = clone $easterSunday;
        $maundyThursday->modify('-3 days');
        $goodFriday = clone $easterSunday;
        $goodFriday->modify('-2 days');
        $saturday = clone $easterSunday;
        $saturday->modify('-1 days');
        $ascensionDay = clone $easterSunday;
        $ascensionDay->modify('+39 days');


        $pentecostSunday = clone $easterSunday;
        $pentecostSunday->modify('+49 days');
        $pentecostMonday = clone $pentecostSunday;
        $pentecostMonday->modify('+1 days');
        $pentecostSaturday = clone $pentecostSunday;
        $pentecostSaturday->modify('-1 days');
        $corpusChristi = clone $easterSunday;
        $corpusChristi->modify('+60 days');

        return array(
            'maundyThursday' => $maundyThursday,
            'easterSunday' => $easterSunday,
            'easterMonday' => $easterMonday,
            'saturday' => $saturday,
            'goodFriday' => $goodFriday,
            'ascensionDay' => $ascensionDay,
            'pentecostSaturday' => $pentecostSaturday,
            'pentecostSunday' => $pentecostSunday,
            'pentecostMonday' => $pentecostMonday,
            'corpusChristi' => $corpusChristi
        );
    }

}
