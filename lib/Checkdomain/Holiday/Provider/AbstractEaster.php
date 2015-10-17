<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class AbstractEaster
 */
abstract class AbstractEaster extends AbstractProvider
{
    const MAUNDY_THURSDAY    = 'maundyThursday';
    const EASTER_SUNDAY      = 'easterSunday';
    const EASTER_MONDAY      = 'easterMonday';
    const EASTER_SATURDAY    = 'easterSaturday';
    const GOOD_FRIDAY        = 'goodFriday';
    const ASCENSION_DAY      = 'ascensionDay';
    const PENTECOST_SATURDAY = 'pentecostSaturday';
    const PENTECOST_SUNDAY   = 'pentecostSunday';
    const PENTECOST_MONDAY   = 'pentecostMonday';
    const CORPUS_CHRISTI     = 'corpusChristi';

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
        $easterSaturday = clone $easterSunday;
        $easterSaturday->modify('-1 days');
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
            self::MAUNDY_THURSDAY    => $maundyThursday,
            self::EASTER_SUNDAY      => $easterSunday,
            self::EASTER_MONDAY      => $easterMonday,
            self::EASTER_SATURDAY    => $easterSaturday,
            self::GOOD_FRIDAY        => $goodFriday,
            self::ASCENSION_DAY      => $ascensionDay,
            self::PENTECOST_SATURDAY => $pentecostSaturday,
            self::PENTECOST_SUNDAY   => $pentecostSunday,
            self::PENTECOST_MONDAY   => $pentecostMonday,
            self::CORPUS_CHRISTI     => $corpusChristi
        );
    }
}
