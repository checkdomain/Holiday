<?php

namespace Checkdomain\Holiday;
use Checkdomain\Holiday\Model\Holiday;

/**
 * Class Util
 */
class Util
{

    /**
     * Instantiates a provider for a given iso code
     *
     * @param string $iso
     *
     * @return ProviderInterface
     */
    protected function getProvider($iso)
    {
        $instance = null;

        $class = '\\Checkdomain\\Holiday\\Provider\\' . $iso;

        if (class_exists($class)) {
            $instance = new $class;
        }

        return $instance;
    }

    /**
     * @param \DateTime|string $date
     *
     * @return \DateTime
     */
    protected function getDateTime($date)
    {
        if (!$date instanceof \DateTime) {
            $date = new \DateTime($date);
        }

        return $date;
    }

    /**
     * @param string $iso
     *
     * @return string
     */
    protected function getIsoCode($iso)
    {
        return strtoupper($iso);
    }

    /**
     * Checks wether a given date is a holiday
     *
     * This method can be used to check whether a specific date is a holiday
     * in a specified country and state
     *
     * @param string           $iso
     * @param \DateTime|string $date
     * @param string           $state
     *
     * @return bool
     */
    public function isHoliday($iso, $date = 'now', $state = null)
    {
        return ($this->getHoliday($iso, $date, $state) !== null);
    }

    /**
     * Provides detailed information about a specific holiday
     *
     * @param string           $iso
     * @param \DateTime|string $date
     * @param string           $state
     *
     * @return Holiday|null
     */
    public function getHoliday($iso, $date = 'now', $state = null)
    {
        $iso = $this->getIsoCode($iso);
        $date = $this->getDateTime($date);

        $provider = $this->getProvider($iso);
        $holiday = $provider->getHolidayByDate($date, $state);

        return $holiday;
    }

}
