<?php

namespace Checkdomain\Holiday\Provider;

/**
 * German holiday provider
 *
 * @author Benjamin Paap <benjamin.paap@gmail.com>
 * @since 2014-01-02
 */
class DE extends AbstractEaster
{

    const STATE_BW = 'Baden-Württemberg';
    const STATE_BY = 'Bayern';
    const STATE_BE = 'Berlin';
    const STATE_BB = 'Brandenburg';
    const STATE_HB = 'Freie Hansestadt Bremen';
    const STATE_HH = 'Hamburg';
    const STATE_HE = 'Hessen';
    const STATE_MV = 'Mecklenburg-Vorpommern';
    const STATE_NI = 'Niedersachsen';
    const STATE_NW = 'Nordrhein-Westfalen';
    const STATE_RP = 'Reinland-Pfalz';
    const STATE_SL = 'Saarland';
    const STATE_SN = 'Sachsen';
    const STATE_ST = 'Sachsen-Anhalt';
    const STATE_SH = 'Schleswig-Holstein';
    const STATE_TH = 'Thüringen';

    /**
     * @param int $year
     *
     * @return array
     */
    public function getHolidaysByYear($year)
    {
        $easter = $this->getEasterDates($year);

        $holidays = array(
            // Fixed dates
            '01-01' => $this->createData('Neujahr'),
            '05-01' => $this->createData('Tag der Arbeit'),
            '10-03' => $this->createData('Tag der Deutschen Einheit'),
            '12-25' => $this->createData('1. Weihnachtstag'),
            '12-26' => $this->createData('2. Weihnachtstag'),

            // Fixed with states
            '01-06' => $this->createData('Heilige Drei Könige', array(
                self::STATE_BW,
                self::STATE_BY,
                self::STATE_ST,
            )),
            '10-31' => $this->createData('Reformationstag', array(
                self::STATE_BB,
                self::STATE_MV,
                self::STATE_SN,
                self::STATE_ST,
                self::STATE_TH,
            )),
            '11-01' => $this->createData('Allerheiligen', array(
                self::STATE_BW,
                self::STATE_BY,
                self::STATE_NW,
                self::STATE_RP,
                self::STATE_SL,
            )),

            // Variable dates
            $easter['goodFriday']->format(self::DATE_FORMAT)      => $this->createData('Karfreitag'),
            $easter['easterSunday']->format(self::DATE_FORMAT)    => $this->createData('Ostersonntag'),
            $easter['easterMonday']->format(self::DATE_FORMAT)    => $this->createData('Ostermontag'),
            $easter['ascensionDay']->format(self::DATE_FORMAT)    => $this->createData('Christi Himmelfahrt'),
            $easter['pentecostMonday']->format(self::DATE_FORMAT) => $this->createData('Pfingstmontag'),

            // Variable with states
            $easter['corpusChristi']->format(self::DATE_FORMAT)   => $this->createData('Fronleichnam', array(
                self::STATE_BW,
                self::STATE_BY,
                self::STATE_HE,
                self::STATE_NW,
                self::STATE_RP,
                self::STATE_SL,
            ))
        );

        return $holidays;
    }

}
