<?php

namespace Checkdomain\Holiday;

/**
 * Interface ProviderInterface
 */
interface ProviderInterface
{

    /**
     * @param \DateTime $date
     * @param string    $state
     *
     * @return Holiday
     */
    public function getHolidayByDate(\DateTime $date, $state = null);

    /**
     * @param int    $year
     *
     * @return mixed
     */
    public function getHolidaysByYear($year);

}