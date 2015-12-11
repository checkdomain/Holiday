<?php

namespace Checkdomain\Holiday\Provider;

/**
 * United States holiday provider.
 * 
 * Data taken from https://en.wikipedia.org/wiki/Public_holidays_in_the_United_States
 *
 * @author Florian Koerner <contact@florian-koerner.com>
 * @since 2015-10-15
 */
class US extends AbstractEaster
{
    // States
	const STATE_AL = 'Alabama';
    const STATE_AK = 'Alaska';
    const STATE_AZ = 'Arizona';
    const STATE_AR = 'Arkansas';
    const STATE_CA = 'California';
    const STATE_CO = 'Colorado';
    const STATE_CT = 'Connecticut';
    const STATE_DE = 'Delaware';
    const STATE_FL = 'Florida';
    const STATE_GA = 'Georgia';
    const STATE_HI = 'Hawaii';
    const STATE_ID = 'Idaho';
    const STATE_IL = 'Illinois';
    const STATE_IN = 'Indiana';
    const STATE_IA = 'Iowa';
    const STATE_KS = 'Kansas';
    const STATE_KY = 'Kentucky';
    const STATE_LA = 'Louisiana';
    const STATE_ME = 'Maine';
    const STATE_MD = 'Maryland';
    const STATE_MA = 'Massachusetts';
    const STATE_MI = 'Michigan';
    const STATE_MN = 'Minnesota';
    const STATE_MS = 'Mississippi';
    const STATE_MO = 'Missouri';
    const STATE_MT = 'Montana';
    const STATE_NE = 'Nebraska';
    const STATE_NV = 'Nevada';
    const STATE_NH = 'New Hampshire';
    const STATE_NJ = 'New Jersey';
    const STATE_NM = 'New Mexico';
    const STATE_NY = 'New York';
    const STATE_NC = 'North Carolina';
    const STATE_ND = 'North Dakota';
    const STATE_OH = 'Ohio';
    const STATE_OK = 'Oklahoma';
    const STATE_OR = 'Oregon';
    const STATE_PA = 'Pennsylvania';
    const STATE_RI = 'Rhode Island';
    const STATE_SC = 'South Carolina';
    const STATE_SD = 'South Dakota';
    const STATE_TN = 'Tennessee';
    const STATE_TX = 'Texas';
    const STATE_UT = 'Utha';
    const STATE_VT = 'Vermont';
    const STATE_VA = 'Virginia';
    const STATE_WA = 'Washington';
    const STATE_WV = 'West Virginia';
    const STATE_WI = 'Wisconsin';
    const STATE_WY = 'Wyoming';

    // Districts
    const STATE_DC = 'District of Columbia';

    // Outlying territories
    const STATE_AS = 'American Samoa';
    const STATE_GU = 'Guam';
    const STATE_MP = 'Northern Mariana Islands';
    const STATE_PR = 'Puerto Rico';
    const STATE_UM = 'United States Minor Outlying Islands';
    const STATE_VI = 'Virgin Islands, U.S.';





    /**
     * @param int $year
     *
     * @return array
     */
    public function getHolidaysDataByYear($year)
    {
        $easter = $this->getEasterDates($year);

        $holidays = array(
            // Fixed dates
            '01-01' => $this->createData('Neujahr'),

            // Variable dates
            $easter['easterSunday']->format(self::DATE_FORMAT)    => $this->createData('Ostersonntag'),
        );

        return $holidays;
    }

}
