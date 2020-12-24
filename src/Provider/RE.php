<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Reunion holiday provider
 *
 * @author Julien Tessier <julien@cari.agency>
 * @since 2020-01-29
 */
class RE extends FR
{
    /**
     * @param int $year
     *
     * @return mixed
     */
    public function getHolidaysByYear($year)
    {
        // sames rules as France
        $holidays = parent::getHolidaysByYear($year);

        // remove holidays for specific states
        foreach($holidays as $date => $holiday) {
            if (isset($holiday['states']) && $holiday['states']) unset($holidays[$date]);
        }
        // but an additional date
        $holidays['12-20'] = $this->createData('Abolition de l\'Esclavage');

        return $holidays;
    }
}
