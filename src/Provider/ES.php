<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Spanish holiday provider
 *
 * @author Remi Schillinger <remi.schillinger@gmail.com>
 * @since 2020-12-22
 */
class ES extends AbstractEaster
{
    const STATE_AN = 'Andalucía';
    const STATE_AR = 'Aragón';
    const STATE_CA = 'Cataluña';
    const STATE_CE = 'Ceuta';
    const STATE_CL = 'Castilla y León';
    const STATE_CM = 'Castilla La Mancha';
    const STATE_CN = 'Cantabria';
    const STATE_CV = 'Comunidad Valenciana';
    const STATE_EX = 'Extremadura';
    const STATE_GA = 'Galicia';
    const STATE_IB = 'Islas Baleares';
    const STATE_IC = 'Islas Canarias';
    const STATE_LR = 'La Rioja';
    const STATE_MA = 'Madrid';
    const STATE_ME = 'Melilla';
    const STATE_MU = 'Murcia';
    const STATE_PA = 'Principado de Asturias';
    const STATE_PV = 'País Vasco';

    /**
     * @param int $year
     *
     * @return mixed
     */
    public function getHolidaysByYear($year)
    {
        $easter = $this->getEasterDates($year);

        $holidays = array(
            '01-01' => $this->createData('Año Nuevo'),
            '01-06' => $this->createData('Epifanía'),
            '02-28' => $this->createData('Día de la comunidad', array(
                self::STATE_AN,
            )),
            '03-01' => $this->createData('Día de la comunidad', array(
                self::STATE_IB,
            )),
            '03-19' => $this->createData('San José', array(
                self::STATE_CM,
                self::STATE_CV,
                self::STATE_GA,
                self::STATE_IB,
                self::STATE_MA,
                self::STATE_ME,
                self::STATE_MU,
                self::STATE_PA,
            )),
            '04-23' => $this->createData('Día de la comunidad', array(
                self::STATE_AR,
                self::STATE_CA,
                self::STATE_CL,
            )),
            '05-01' => $this->createData('Fiesta del Trabajo'),
            '05-02' => $this->createData('Día de la comunidad', array(
                self::STATE_MA,
            )),
            '05-30' => $this->createData('Día de la comunidad', array(
                self::STATE_IC,
            )),
            '05-17' => $this->createData('Día das Letras Galegas', array(
                self::STATE_GA,
            )),
            '05-31' => $this->createData('Día de la comunidad', array(
                self::STATE_CM,
            )),
            '06-09' => $this->createData('Día de la comunidad', array(
                self::STATE_LR,
                self::STATE_MU,
            )),
            '07-25' => $this->createData('Santiago Apóstol', array(
                self::STATE_GA,
                self::STATE_MA,
            )),
            '08-15' => $this->createData('Asunción de la Virgen Maria'),
            '09-02' => $this->createData('Día de la comunidad', array(
                self::STATE_CE,
            )),
            '09-08' => $this->createData('Día de la comunidad', array(
                self::STATE_EX,
                self::STATE_PA,
            )),
            '09-11' => $this->createData('Día de la comunidad', array(
                self::STATE_CA,
            )),
            '09-15' => $this->createData('Día de la comunidad', array(
                self::STATE_CN,
            )),
            '10-09' => $this->createData('Día de la comunidad', array(
                self::STATE_CV,
            )),
            '10-12' => $this->createData('Fiesta Nacional de España'),
            '10-25' => $this->createData('Euskadi Eguna', array(
                self::STATE_PV,
            )),
            '11-01' => $this->createData('Todos los Santos'),
            '12-06' => $this->createData('Día de la Constitución'),
            '12-08' => $this->createData('La Inmaculada Concepción'),
            '12-25' => $this->createData('Navidad del Señor'),
            '12-26' => $this->createData('San Esteban'),
            // Variable dates
            $easter['goodFriday']->format(self::DATE_FORMAT)      => $this->createData('Viernes Santo'),
            $easter['easterMonday']->format(self::DATE_FORMAT)    => $this->createData('Lunes de Pascua', array(
                self::STATE_CA,
                self::STATE_CV,
                self::STATE_IB,
                self::STATE_PV,
            )),
            $easter['corpusChristi']->format(self::DATE_FORMAT)    => $this->createData('Corpus Cristi', array(
                self::STATE_MA,
            )),
        );

        return $holidays;
    }
}
