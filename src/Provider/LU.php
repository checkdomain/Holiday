<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Luxembourg holiday provider
 *
 * @author Jeremy Libert <libert.jeremy@gmail.com>
 * @since 2019-04-23
 */
class LU extends AbstractEaster
{
    /**
     * @param int $year
     *
     * @return mixed
     */
    public function getHolidaysByYear($year)
    {
        $easter = $this->getEasterDates($year);

        $holidays = array(
            '01-01' => $this->createData('Jour de l\'an'),
            '05-01' => $this->createData('Premier Mai'),
            '06-23' => $this->createData('Jour de la célébration de l\'anniversaire du Grand-Duc'),
            '08-15' => $this->createData('Assomption'),
            '11-01' => $this->createData('Toussaint'),
            '12-25' => $this->createData('Premier jour de Noël'),
            '12-26' => $this->createData('Deuxième jour de Noël'),
            // Variable dates
            $easter['easterMonday']->format(self::DATE_FORMAT) => $this->createData('Lundi de Pâques'),
            $easter['ascensionDay']->format(self::DATE_FORMAT) => $this->createData('Ascension'),
            $easter['pentecostMonday']->format(self::DATE_FORMAT) => $this->createData('Lundi de Pentecôte'),
        );

        if (2019 <= $year) {
            $holidays['05-09'] = $this->createData('Journée de l\'Europe');
        }

        return $holidays;
    }
}
