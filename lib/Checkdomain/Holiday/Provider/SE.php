<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Swedish holiday provider
 *
 * @author Martin Lindhe
 * @since 2015-03-22
 **/
class SE extends AbstractEaster
{
    /**
     * @param int $year
     *
     * @return array
     */
    public function getHolidaysDataByYear($year)
    {
        $easter = $this->getEasterDates($year);

        $midSummerDay = $this->getMidSummerDay($year);

        $allSaintsDay = $this->getAllSaintsDay($year);

        return array(
            '01-01' => $this->createData('Nyårsdagen'),
            '01-05' => $this->createData('Trettondagsafton', array('halfday' => true)),
            '01-06' => $this->createData('Trettondedag jul'),
            '04-30' => $this->createData('Valborgsmässoafton', array('halfday' => true)),
            '05-01' => $this->createData('Första maj'),
            '06-06' => $this->createData('Sveriges nationaldag'),
            '12-24' => $this->createData('Julafton'),
            '12-25' => $this->createData('Juldagen'),
            '12-26' => $this->createData('Annandag jul'),
            '12-31' => $this->createData('Nyårsafton'),

            // Variable dates
            $easter[self::MAUNDY_THURSDAY]->format(self::DATE_FORMAT)    => $this->createData('Skärtorsdagen', array('halfday' => true)),
            $easter[self::GOOD_FRIDAY]->format(self::DATE_FORMAT)        => $this->createData('Långfredagen'),
            $easter[self::EASTER_SATURDAY]->format(self::DATE_FORMAT)    => $this->createData('Påskafton'),
            $easter[self::EASTER_SUNDAY]->format(self::DATE_FORMAT)      => $this->createData('Påskdagen'),
            $easter[self::EASTER_MONDAY]->format(self::DATE_FORMAT)      => $this->createData('Annandag påsk'),
            $easter[self::ASCENSION_DAY]->format(self::DATE_FORMAT)      => $this->createData('Kristi himmelsfärdsdag'),
            $easter[self::PENTECOST_SATURDAY]->format(self::DATE_FORMAT) => $this->createData('Pingstafton'),
            $easter[self::PENTECOST_SUNDAY]->format(self::DATE_FORMAT)   => $this->createData('Pingstdagen'),

            $midSummerDay->format(self::DATE_FORMAT)                     => $this->createData('Midsommardagen'),
            $midSummerDay->modify('-1 day')->format(self::DATE_FORMAT)   => $this->createData('Midsommarafton'),

            $allSaintsDay->format(self::DATE_FORMAT)                     => $this->createData('Alla helgons dag'),
            $allSaintsDay->modify('-1 day')->format(self::DATE_FORMAT)   => $this->createData('Allhelgonaafton', array('halfday' => true))
        );
    }

    /**
     * The Swedish midsummer day is the saturday between 20 and 26:th of June
     * @param int $year
     * @return \DateTime
     */
    public function getMidSummerDay($year)
    {
        $date = new \DateTime($year.'-06-20');
        for ($i = 0; $i < 7; $i++) {
            if ($date->format('w') == 6) {
                break;
            }
            $date->add(new \DateInterval('P1D'));
        }

        return $date;
    }

    /**
     * The Swedish 'alla helgons dag' is the saturday between 31 October and 6:th of November
     * @param int $year
     * @return \DateTime
     */
    public function getAllSaintsDay($year)
    {
        $date = new \DateTime($year.'-10-31');
        for ($i = 0; $i < 7; $i++) {
            if ($date->format('w') == 6) {
                break;
            }
            $date->add(new \DateInterval('P1D'));
        }

        return $date;
    }
}
