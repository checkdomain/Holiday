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
    public function getHolidaysByYear($year)
    {
        $easter = $this->getEasterDates($year);

        $midSummerDay = $this->getMidSummerDay($year);

        $allSaintsDay = $this->getAllSaintsDay($year);

        return array(
            '01-01' => $this->createData('Nyårsdagen', true),
            '01-05' => $this->createData('Trettondagsafton', true, array('halfday' => true)),
            '01-06' => $this->createData('Trettondedag jul', true),
            '04-30' => $this->createData('Valborgsmässoafton', true, array('halfday' => true)),
            '05-01' => $this->createData('Första maj', true),
            '06-06' => $this->createData('Sveriges nationaldag', true),
            '12-24' => $this->createData('Julafton', true),
            '12-25' => $this->createData('Juldagen', true),
            '12-26' => $this->createData('Annandag jul', true),
            '12-31' => $this->createData('Nyårsafton', true),
            // Variable dates
            $easter['maundyThursday']->format(self::DATE_FORMAT) => $this->createData('Skärtorsdagen', true, array('halfday' => true)),
            $easter['goodFriday']->format(self::DATE_FORMAT) => $this->createData('Långfredagen', true),
            $easter['saturday']->format(self::DATE_FORMAT) => $this->createData('Påskafton', true),
            $easter['easterSunday']->format(self::DATE_FORMAT) => $this->createData('Påskdagen', true),
            $easter['easterMonday']->format(self::DATE_FORMAT) => $this->createData('Annandag påsk', true),
            $easter['ascensionDay']->format(self::DATE_FORMAT) => $this->createData('Kristi himmelsfärdsdag', true),
            $easter['pentecostSaturday']->format(self::DATE_FORMAT) => $this->createData('Pingstafton', true),
            $easter['pentecostSunday']->format(self::DATE_FORMAT) => $this->createData('Pingstdagen', true),

            $midSummerDay->format(self::DATE_FORMAT) => $this->createData('Midsommardagen', true),
            $midSummerDay->modify('-1 day')->format(self::DATE_FORMAT) => $this->createData('Midsommarafton', true),

            $allSaintsDay->format(self::DATE_FORMAT) => $this->createData('Alla helgons dag', true),
            $allSaintsDay->modify('-1 day')->format(self::DATE_FORMAT) => $this->createData('Allhelgonaafton', true, array('halfday' => true))
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
