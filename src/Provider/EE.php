<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Estonian non-working holidays provider
 *
 * @author Roman Agilov <agilovr@gmail.com>
 * @since 2018-03-27
 * @see https://en.wikipedia.org/wiki/Public_holidays_in_Estonia
 */
class EE extends AbstractEaster
{
    /**
     * Getting non-working holidays
     *
     * @param int $year
     *
     * @return mixed
     */
    public function getHolidaysByYear($year)
    {
        $easter = $this->getEasterDates($year);

        $holidays = array(

            '01-01' => $this->createData('uusaasta'),
            '02-24' => $this->createData('iseseisvuspäev'),
            '05-01' => $this->createData('kevadpüha'),
            '06-23' => $this->createData('võidupüha and jaanilaupäev'),
            '06-24' => $this->createData('võidupüha and jaanilaupäev'),
            '08-20' => $this->createData('taasiseseisvumispäev'),
            '12-24' => $this->createData('jõululaupäev'),
            '12-25' => $this->createData('esimene jõulupüha'),
            '12-26' => $this->createData('teine jõulupüha'),

            // Easter dates
            $easter['goodFriday']->format(self::DATE_FORMAT) => $this->createData('suur reede'),
            $easter['easterSunday']->format(self::DATE_FORMAT) => $this->createData('ülestõusmispühade 1. püha'),

            $easter['pentecostSunday']->format(self::DATE_FORMAT) => $this->createData('nelipühade 1. püha'),
        );

        return $holidays;
    }

}
