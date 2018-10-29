<?php

namespace Checkdomain\Holiday\Provider;

use Checkdomain\Holiday\Helper\EasterUtil;

/**
 * Hungarian non-working holidays provider
 *
 * @author Roman Agilov <agilovr@gmail.com>
 * @since 2018-03-27
 * @see https://en.wikipedia.org/wiki/Public_holidays_in_Hungary
 */
class HU extends AbstractProvider
{
    /**
     *
     *
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
           '01-01' => $this->createData('Újév'),
           '03-15' => $this->createData('Nemzeti ünnep'),
           '05-01' => $this->createData('A munka ünnepe'),
           '08-20' => $this->createData('Az államalapítás ünnepe'),
           '10-23' => $this->createData('Nemzeti ünnep'),
           '11-01' => $this->createData('Mindenszentek'),
           '12-25' => $this->createData('Karácsony'),
           '12-26' => $this->createData('Karácsony'),

            // Easter dates
            $easter->getDate(EasterUtil::EASTER_SUNDAY) => $this->createData('Húsvétvasárnap'),
            $easter->getDate(EasterUtil::EASTER_MONDAY) => $this->createData('Húsvéthétfő'),

            $easter->getDate(EasterUtil::PENTECOST_SUNDAY) => $this->createData('Pünkösdvasárnap'),
            $easter->getDate(EasterUtil::PENTECOST_MONDAY) => $this->createData('Pünkösdhétfő'),
        );

        //add holidays post 2017
        if ($year >= 2017) {
            $holidays[$easter->getDate(EasterUtil::GOOD_FRIDAY)] = $this->createData('Nagypéntek');
        }

        return $holidays;
    }

}
