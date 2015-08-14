<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Austrian holiday provider.
 * 
 * Data taken from http://www.feiertage-oesterreich.at/2015/
 *
 * @author Robert Scherer <rs@scherer-software.de>
 * @since 2015-08-14
 */
class AT extends AbstractEaster
{

	const STATE_B = 'Burgenland';
	const STATE_K = 'Kärnten';
	const STATE_NO = 'Niederösterreich';
	const STATE_OO = 'Oberösterreich';
	const STATE_S = 'Salzburg';
	const STATE_ST = 'Steiermark';
	const STATE_T = 'Tirol';
	const STATE_V = 'Vorarlberg';
	const STATE_W = 'Wien';

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
            '01-01' => $this->createData('Neujahr', true),
            '01-06' => $this->createData('Heilige Drei Könige', true),
            '11-01' => $this->createData('Allerheiligen', true),
            '08-15' => $this->createData('Mariä Himmelfahrt', true),
            '05-01' => $this->createData('Staatsfeiertag', true),
            '10-26' => $this->createData('Nationalfeiertag', true),
            '12-08' => $this->createData('Mariä Empfängnis', true),
            '12-25' => $this->createData('Weihnachten', true),
            '12-26' => $this->createData('Stefanitag', true),

            // Variable dates
            #$easter['goodFriday']->format(self::DATE_FORMAT)      => $this->createData('Karfreitag', true),
            $easter['easterSunday']->format(self::DATE_FORMAT)    => $this->createData('Ostersonntag', true),
            $easter['easterMonday']->format(self::DATE_FORMAT)    => $this->createData('Ostermontag', true),
            $easter['ascensionDay']->format(self::DATE_FORMAT)    => $this->createData('Christi Himmelfahrt', true),
            $easter['pentecostMonday']->format(self::DATE_FORMAT) => $this->createData('Pfingstmontag', true),
            $easter['corpusChristi']->format(self::DATE_FORMAT)   => $this->createData('Fronleichnam', true),
        );

        return $holidays;
    }

}