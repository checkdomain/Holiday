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

        $repentanceDay = $this->getDayOfRepentance($year);

        // 500th anniversay of the Reformation
        // @see https://de.wikipedia.org/wiki/Reformationstag#Deutschland
        if (2017 === $year) {
            $reformationDayStates = null;
        } else {
            $reformationDayStates = array(
                self::STATE_BB,
                self::STATE_MV,
                self::STATE_SN,
                self::STATE_ST,
                self::STATE_TH,
                self::STATE_SH,
                self::STATE_HH,
                self::STATE_NI,
                self::STATE_HB
            );
        }

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
            '10-31' => $this->createData('Reformationstag', $reformationDayStates),
            '11-01' => $this->createData('Allerheiligen', array(
                self::STATE_BW,
                self::STATE_BY,
                self::STATE_NW,
                self::STATE_RP,
                self::STATE_SL,
            )),
            // International Women's Day
            // @see https://de.wikipedia.org/wiki/Internationaler_Frauentag#Der_Frauentag_als_gesetzlicher_Feiertag
            '03-08' => $this->createData('Internationaler Frauentag', array(
                self::STATE_BE,
            )),

            // Variable dates
            $easter['goodFriday']->format(self::DATE_FORMAT)      => $this->createData('Karfreitag'),
            $easter['easterSunday']->format(self::DATE_FORMAT)    => $this->createData('Ostersonntag', array(
                self::STATE_BB,
                self::STATE_HE,
            )),
            $easter['easterMonday']->format(self::DATE_FORMAT)    => $this->createData('Ostermontag'),
            $easter['ascensionDay']->format(self::DATE_FORMAT)    => $this->createData('Christi Himmelfahrt'),
            $easter['pentecostSunday']->format(self::DATE_FORMAT) => $this->createData('Pfingstsonntag', array(
                self::STATE_BB,
                self::STATE_HE,
            )),
            $easter['pentecostMonday']->format(self::DATE_FORMAT) => $this->createData('Pfingstmontag'),

            // Variable with states
            $easter['corpusChristi']->format(self::DATE_FORMAT)   => $this->createData('Fronleichnam', array(
                self::STATE_BW,
                self::STATE_BY,
                self::STATE_HE,
                self::STATE_NW,
                self::STATE_RP,
                self::STATE_SL,
            )),
            $repentanceDay->format(self::DATE_FORMAT) => $this->createData('Buß- und Bettag', array(
                self::STATE_SN
            ))
        );

        return $holidays;
    }

    /**
     * The German day of repentance is the wednesday befor the 23rd of November
     * @param int $year
     * @return \DateTime
     */
    public function getDayOfRepentance($year)
    {
        $date = new \DateTime($year.'-11-23');
        $date->modify('previous wednesday');

        return $date;
    }

}
