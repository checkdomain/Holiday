<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Italian holiday provider
 *
 * @author Giorgio Cefaro <giorgio.cefaro@gmail.com>
 * @since 2015-11-03
 */
class IT extends AbstractEaster
{

    /**
     * @param int $year
     *
     * @return mixed
     */
    public function getHolidaysByYear($year)
    {
        $easter = $this->getEasterDates($year);

        $holidays = array(
            '01-01' => $this->createData('Capodanno', true),
            '01-06' => $this->createData('Epifania', true),
            '04-25' => $this->createData('Liberazione dal nazifascismo (1945)', true),
            '05-01' => $this->createData('Festa del lavoro', true),
            '06-02' => $this->createData('Festa della Repubblica', true),
            '08-15' => $this->createData('Assunzione di Maria', true),
            '11-01' => $this->createData('Ognissanti', true),
            '12-08' => $this->createData('Immacolata Concezione', true),
            '12-25' => $this->createData('Natale di Gesù', true),
            '12-26' => $this->createData('Santo Stefano', true),
            // Variable dates
            $easter['easterMonday']->format(self::DATE_FORMAT)    => $this->createData('Lunedì di Pasqua', true)
        );

        return $holidays;
    }
}
