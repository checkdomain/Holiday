<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Provider for information about Australian public holidays.
 *
 * Federal: http://www.australia.gov.au/about-australia/special-dates-and-events/public-holidays
 * Western Australia: http://www.commerce.wa.gov.au/labour-relations/public-holidays-western-australia
 *
 * @author Sam Wilson <sam@samwilson.id.au>
 * @since 2015-10-05
 */
class AU extends AbstractEaster {

    const STATE_WA = 'Western Australia';
    const STATE_SA = 'South Australia';
    const STATE_VIC = 'Victoria';
    const STATE_QLD = 'Queensland';
    const STATE_NSW = 'New South Wales';
    const STATE_NT = 'Northern Territory';
    const STATE_ACT = 'Australian Capital Territory';
    const STATE_TAS = 'Tasmania';

    /**
     * Get an array of holidays for a given year.
     * @param int $year
     * @return mixed
     */
    public function getHolidaysByYear($year) {
        $holidays = array_merge(
                $this->newYearsDay($year), $this->australiaDay($year), $this->easter($year), $this->anzacDay($year)
        );
        return $holidays;
    }

    /**
     * New Year's Day.
     * If the 1st is a Saturday or Sunday, the following Monday is the holiday.
     * @param int $year
     * @return array
     */
    protected function newYearsDay($year) {
        $newYearsDay = new \DateTime($year . '-01-01');
        if ($newYearsDay->format('l') === 'Sunday') {
            $dateFormat = '01-02';
        } elseif ($newYearsDay->format('l') === 'Saturday') {
            $dateFormat = '01-03';
        } else {
            $dateFormat = '01-01';
        }
        return array(
            $dateFormat => $this->createData("New Year's Day", true),
        );
    }

    /**
     * Australia Day.
     * If the 26th is a Saturday or Sunday, the following Monday is the holiday.
     * @param int $year
     * @return array
     */
    protected function australiaDay($year) {
        $newYearsDay = new \DateTime($year . '-01-26');
        if ($newYearsDay->format('l') === 'Sunday') {
            $dateFormat = '01-27';
        } elseif ($newYearsDay->format('l') === 'Saturday') {
            $dateFormat = '01-28';
        } else {
            $dateFormat = '01-26';
        }
        return array(
            $dateFormat => $this->createData("Australia Day", true),
        );
    }

    /**
     * ANZAC Day is always on the 25th unless Easter Monday is that day.
     * @param int $year
     */
    protected function anzacDay($year) {
        $dateFormat = '04-25';
        $anzacDay = new \DateTime("$year-$dateFormat");
        if ($anzacDay->format('l') === 'Sunday') {
            $dateFormat = '04-26';
        } elseif ($anzacDay->format('l') === 'Saturday') {
            $dateFormat = '04-27';
        }
        return array(
            $dateFormat => $this->createData('ANZAC Day', true),
        );
    }

    /**
     * Easter dates are standard, unless the Monday conflicts with ANZAC Day.
     * @param ing $year
     * @return array
     */
    protected function easter($year) {
        $easter = $this->getEasterDates($year);

        // Conflicts with ANZAC Day? Shift to the following day.
        $easterMondayName = 'Easter Monday';
        if ($easter['easterMonday']->format('d') == '25') {
            $easter['easterMonday']->add(new \DateInterval('P1D'));
            $easterMondayName = 'Easter Monday Holiday';
        }

        return array(
            $easter['goodFriday']->format(self::DATE_FORMAT) => $this->createData('Good Friday', true),
            $easter['easterMonday']->format(self::DATE_FORMAT) => $this->createData($easterMondayName, true),
        );
    }

}
