<?php

namespace Checkdomain\Holiday\Helper;

/**
 * Helper class for calculating church holidays.
 */
class EasterUtil
{

    const
        SHROVE_TUESDAY = -47,
        MAUNDY_THURSDAY = -3,
        GOOD_FRIDAY = -2,
        EASTER_SATURDAY = -1,
        EASTER_SUNDAY = 0,
        EASTER_MONDAY = 1,
        ASCENSION_DAY = 39,
        PENTECOST_SATURDAY = 48,
        PENTECOST_SUNDAY = 49,
        PENTECOST_MONDAY = 50,
        CORPUS_CHRISTI = 60;


    /** @var int */
    private $year;


    /**
     * @param int $year
     */
    public function __construct($year)
    {
        if (!is_int($year) && !ctype_digit($year)) {
            throw new \InvalidArgumentException('Parameter $year must be an integer. Given value "'.$year.'" is not.');
        }

        $this->year = $year;
    }


    /**
     * Calculates a date relative to Easter Sunday
     *
     * @param int $offsetDays Offset (in days) from Easter Sunday
     *
     * @return string
     */
    public function getDate($offsetDays = 0)
    {
        $dayDiff = easter_days($this->year) + $offsetDays;

        return date('m-d', strtotime($this->year.'-03-21 +'.$dayDiff.' days'));
    }


    /**
     * Calculates a date relative to Easter Sunday according to the Julian calendar
     *
     * @param int $offsetDays Offset (in days) from Easter Sunday
     *
     * @return string
     */
    public function getOrthodoxDate($offsetDays = 0)
    {
        $dayDiff = easter_days($this->year, CAL_EASTER_ALWAYS_JULIAN) + $offsetDays;

        // We still want a Gregorian date, that's why the date is offset from April 3rd
        // (which is March 21st in Julian calendar.)
        return date('m-d', strtotime($this->year.'-04-03 +'.$dayDiff.' days'));
    }
}
