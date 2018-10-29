<?php

namespace Checkdomain\Holiday\Provider;

use Checkdomain\Holiday\Helper\EasterUtil;

/**
 * Denmark holiday provider
 *
 * @author Florian Körner <contact@florian-koerner.com>
 * @since 2015-10-15
 */
class DK extends AbstractProvider
{
    /**
     * @param int $year
     *
     * @return mixed
     */
    public function getHolidaysByYear($year)
    {
        $easter = new EasterUtil($year);

        $holidays = array(
            '01-01' => $this->createData('Nytår'),
            '12-25' => $this->createData('1. Juledag'),
            '12-26' => $this->createData('2. Juledag'),

            // Variable dates
            $easter->getDate(EasterUtil::MAUNDY_THURSDAY)  => $this->createData('Skærtorsdag'),
            $easter->getDate(EasterUtil::GOOD_FRIDAY)      => $this->createData('Langfredag'),
            $easter->getDate(EasterUtil::EASTER_SUNDAY)    => $this->createData('Påskedag'),
            $easter->getDate(EasterUtil::EASTER_MONDAY)    => $this->createData('2. Påskedag'),
            $easter->getDate(26)                           => $this->createData('Store Bededag'),
            $easter->getDate(EasterUtil::ASCENSION_DAY)    => $this->createData('Kristi Himmelfartsdag'),
            $easter->getDate(EasterUtil::PENTECOST_SUNDAY) => $this->createData('Pinsedag'),
            $easter->getDate(EasterUtil::PENTECOST_MONDAY) => $this->createData('2. Pinsedag')
        );

        return $holidays;
    }
}
