<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Belgian holiday provider
 *
 * @author Jul6art <admin@devinthehood.com>
 * @since 2020-11-09
 */
class BE extends AbstractEaster
{
    /**
     * @param int $year
     *
     * @return mixed
     */
    public function getHolidaysByYear($year)
    {
        $easter = $this->getEasterDates($year);

        return [
            '01-01' => $this->createData('Jour de l\'an'),
            '05-01' => $this->createData('Fête du Travail'),
            '07-21' => $this->createData('Fête Nationale'),
            '08-15' => $this->createData('Assomption'),
            '11-01' => $this->createData('Toussaint'),
            '11-11' => $this->createData('Armistice'),
            '12-25' => $this->createData('Noël'),
            $easter['easterMonday']->format(self::DATE_FORMAT) => $this->createData('Lundi de Pâques'),
            $easter['ascensionDay']->format(self::DATE_FORMAT) => $this->createData('Jeudi de l\'Ascension'),
            $easter['pentecostMonday']->format(self::DATE_FORMAT) => $this->createData('Lundi de Pentecôte'),
        ];
    }
}
