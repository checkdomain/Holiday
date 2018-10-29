<?php

namespace Checkdomain\Holiday\Provider;

use Checkdomain\Holiday\Helper\EasterUtil;

/**
 * Estonian non-working holidays provider
 *
 * @author Roman Agilov <agilovr@gmail.com>
 * @since 2018-03-27
 * @see https://en.wikipedia.org/wiki/Public_holidays_in_Estonia
 */
class EE extends AbstractProvider
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
        $easter = new EasterUtil($year);

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
            $easter->getDate(EasterUtil::GOOD_FRIDAY)      => $this->createData('suur reede'),
            $easter->getDate(EasterUtil::EASTER_SUNDAY)    => $this->createData('ülestõusmispühade 1. püha'),
            $easter->getDate(EasterUtil::PENTECOST_SUNDAY) => $this->createData('nelipühade 1. püha'),
        );

        return $holidays;
    }

}
