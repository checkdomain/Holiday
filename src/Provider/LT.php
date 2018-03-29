<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Lithuanian non-working holidays provider
 *
 * @author Roman Agilov <agilovr@gmail.com>
 * @since 2018-03-27
 * @see https://en.wikipedia.org/wiki/Public_holidays_in_Lithuania
 */
class LT extends AbstractEaster
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
        
        $mothersDay = date('m-d', strtotime('first Sunday of May '. $year));
        $fathersDay = date('m-d', strtotime('first Sunday of June '. $year));
        
        $holidays = array(
            '01-01' => $this->createData('Naujieji metai'),
            '02-16' => $this->createData('Lietuvos valstybės atkūrimo diena'),
            '03-11' => $this->createData('Lietuvos nepriklausomybės atkūrimo diena'),
            '05-01' => $this->createData('Tarptautinė darbo diena'),
            '06-24' => $this->createData('Joninės, Rasos'),
            '07-06' => $this->createData('Valstybės (Lietuvos karaliaus Mindaugo karūnavimo) diena'),
            '08-15' => $this->createData('Žolinė (Švč. Mergelės Marijos ėmimo į dangų diena)'),
            '11-01' => $this->createData('Visų šventųjų diena (Vėlinės)'),
            '12-24' => $this->createData('Šv. Kūčios'),
            '12-25' => $this->createData('Šv. Kalėdos'),
            '12-26' => $this->createData('Šv. Kalėdos'),

            // floating days
            $mothersDay => $this->createData('Motinos diena'),
            $fathersDay => $this->createData('Tėvo diena'),
            
            // Easter dates
            $easter['easterSunday']->format(self::DATE_FORMAT) => $this->createData('Velykos'),
        );

        return $holidays;
    }

}
