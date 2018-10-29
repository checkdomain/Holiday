<?php

namespace Checkdomain\Holiday\Provider;

use Checkdomain\Holiday\Helper\EasterUtil;

/**
 * Romanian non-working holidays provider
 *
 * @author Roman Agilov <agilovr@gmail.com>
 * @since 2018-03-27
 * @see https://en.wikipedia.org/wiki/Public_holidays_in_Romania
 */
class RO extends AbstractProvider
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
        // make i
        $easter = new EasterUtil($year);

        $holidays = array(
            '01-01' => $this->createData('Anul Nou'),
            '01-02' => $this->createData('Anul Nou'),
            '01-24' => $this->createData('Unirea Principatelor Române/Mica Unire'),
            '05-01' => $this->createData('Ziua Muncii'),
            '08-15' => $this->createData('Adormirea Maicii Domnului/Sfânta Maria Mare'),

            '11-30' => $this->createData('Sfântul Andrei'),
            '12-01' => $this->createData('Ziua Națională/Ziua Marii Uniri'),
            '12-25' => $this->createData('Crăciunul'),
            '12-26' => $this->createData('Crăciunul'),

            // Easter dates
            $easter->getOrthodoxDate(EasterUtil::GOOD_FRIDAY) => $this->createData('Paștele'),
            $easter->getOrthodoxDate(EasterUtil::EASTER_SUNDAY) => $this->createData('Paștele'),
            $easter->getOrthodoxDate(EasterUtil::EASTER_MONDAY) => $this->createData('Paștele'),

            $easter->getOrthodoxDate(EasterUtil::PENTECOST_SUNDAY) => $this->createData('Rusaliile'),
            $easter->getOrthodoxDate(EasterUtil::PENTECOST_MONDAY) => $this->createData('Rusaliile'),
        );

        //add holidays post 2017
        if ($year >= 2017) {
            $holidays['06-01'] = $this->createData('Ziua Copilului');
        }

        return $holidays;
    }

}
