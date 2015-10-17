<?php

namespace Checkdomain\Holiday;

/**
 * Interface ProviderInterface
 */
interface ProviderInterface
{
    /**
     * Returns all holidays models by year
     *
     * @param int         $year
     * @param string|null $state
     *
     * @return array
     */
    public function getHolidaysByYear($year, $state = null);

    /**
     * Provides detailed information about a specific holiday
     *
     * @param \DateTime   $date
     * @param string|null $state
     *
     * @return Model\Holiday
     */
    public function getHoliday(\DateTime $date, $state = null);

    /**
     * Checks wether a given date is a holiday
     *
     * This method can be used to check whether a specific date is a holiday
     * in a specified country and state
     *
     * @param \DateTime   $date
     * @param string|null $state
     *
     * @return bool
     */
    public function isHoliday(\DateTime $date, $state = null);

    /**
     * @param \DateTime $date
     * @param string    $state
     *
     * @return Model\Holiday
     *
     * @deprecated and will be removed in 3.0 - use `getHoliday` instead
     */
    public function getHolidayByDate(\DateTime $date, $state = null);

    /**
     * @param int $year
     *
     * @return array
     */
    public function getHolidaysDataByYear($year);
}
