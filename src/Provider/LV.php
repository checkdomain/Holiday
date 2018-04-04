<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Latvian non-working holidays provider
 *
 * @author Roman Agilov <agilovr@gmail.com>
 * @since 2018-03-27
 * @see https://en.wikipedia.org/wiki/Public_holidays_in_Latvia
 */
class LV extends AbstractEaster
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

        $mothersDay = date('m-d', strtotime('second Sunday of May '. $year));

        $holidays = array(
            '01-01' => $this->createData('Jaunais Gads'),
            '05-01' => $this->createData('Darba svētki'),
            '05-04' => $this->createData('Latvijas Republikas Neatkarības atjaunošanas diena'),
            $mothersDay => $this->createData('Mātes diena'),
            '06-23' => $this->createData('Līgo Diena'),
            '06-24' => $this->createData('Jāņi'),
            '11-18' => $this->createData('Latvijas Republikas proklamēšanas diena'),
            '12-24' => $this->createData('Ziemassvētku vakars'),
            '12-25' => $this->createData('Ziemassvētki'),
            '12-26' => $this->createData('Otrie Ziemassvētki'),
            '12-31' => $this->createData('Vecgada vakars'),

            // Easter dates
            $easter['goodFriday']->format(self::DATE_FORMAT) => $this->createData('Lielā Piektdiena'),
            $easter['easterSunday']->format(self::DATE_FORMAT) => $this->createData('Lieldienas'),
            $easter['easterMonday']->format(self::DATE_FORMAT) => $this->createData('Otrās Lieldienas'),
        );

        return $holidays;
    }

}
