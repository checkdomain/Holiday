<?php

namespace Checkdomain\Holiday\Provider;

use Checkdomain\Holiday\Helper\EasterUtil;

/**
 * Austrian holiday provider.
 * 
 * Data taken from http://www.feiertage-oesterreich.at/2015/
 *
 * @author Robert Scherer <rs@scherer-software.de>
 * @since 2015-08-14
 */
class AT extends AbstractProvider
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
        $easter = new EasterUtil($year);

        $holidays = array(
            // Fixed dates
            '01-01' => $this->createData('Neujahr'),
            '01-06' => $this->createData('Heilige Drei Könige'),
            '11-01' => $this->createData('Allerheiligen'),
            '08-15' => $this->createData('Mariä Himmelfahrt'),
            '05-01' => $this->createData('Staatsfeiertag'),
            '10-26' => $this->createData('Nationalfeiertag'),
            '12-08' => $this->createData('Mariä Empfängnis'),
            '12-25' => $this->createData('Weihnachten'),
            '12-26' => $this->createData('Stefanitag'),

            // Variable dates
            $easter->getDate(EasterUtil::EASTER_SUNDAY)    => $this->createData('Ostersonntag'),
            $easter->getDate(EasterUtil::EASTER_MONDAY)    => $this->createData('Ostermontag'),
            $easter->getDate(EasterUtil::ASCENSION_DAY)    => $this->createData('Christi Himmelfahrt'),
            $easter->getDate(EasterUtil::PENTECOST_MONDAY) => $this->createData('Pfingstmontag'),
            $easter->getDate(EasterUtil::CORPUS_CHRISTI)   => $this->createData('Fronleichnam'),
        );

        return $holidays;
    }

}
