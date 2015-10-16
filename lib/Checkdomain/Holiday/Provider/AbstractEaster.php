<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class Easter
 */
abstract class AbstractEaster extends AbstractProvider
{

    /**
     * Returns all dates calculated by easter sunday
     *
     * @param int $year
     *
     * @return \DateTime[]
     */
    protected function getEasterDates($year)
    {
        $easterSunday = new \DateTime('21.03.'.$year);
        $easterSunday->modify(sprintf('+%d days', easter_days($year)));
        $easterSunday->setTimezone(new \DateTimeZone(ini_get('date.timezone')));

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
            'maundyThursday'    => $maundyThursday,
            'easterSunday'      => $easterSunday,
            'easterMonday'      => $easterMonday,
            'saturday'          => $saturday,
            'goodFriday'        => $goodFriday,
            'ascensionDay'      => $ascensionDay,
            'pentecostSaturday' => $pentecostSaturday,
            'pentecostSunday'   => $pentecostSunday,
            'pentecostMonday'   => $pentecostMonday,
            'corpusChristi'     => $corpusChristi
        );
    }

}
