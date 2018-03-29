<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Romanian non-working holidays provider
 *
 * @author Roman Agilov <agilovr@gmail.com>
 * @since 2018-03-27
 * @see https://en.wikipedia.org/wiki/Public_holidays_in_Romania
 */
class RO extends AbstractEaster
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
        $easter = $this->getEasterDates($year, true);

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
            $easter['goodFriday']->format(self::DATE_FORMAT) => $this->createData('Paștele'),
            $easter['easterSunday']->format(self::DATE_FORMAT) => $this->createData('Paștele'),
            $easter['easterMonday']->format(self::DATE_FORMAT) => $this->createData('Paștele'),

            $easter['pentecostSunday']->format(self::DATE_FORMAT) => $this->createData('Rusaliile'),
            $easter['pentecostMonday']->format(self::DATE_FORMAT) => $this->createData('Rusaliile'),
        );

        //add holidays post 2017
        if ($year >= 2017) {
            $holidays['06-01'] = $this->createData('Ziua Copilului');
        }

        return $holidays;
    }

}
