<?php

namespace Checkdomain\Holiday;
use Checkdomain\Holiday\Model\Holiday;

/**
 * Class Util
 *
 * @deprecated and will be removed in 3.0 - Use provider directly via `\Checkdomain\Holiday\Loader`
 */
class Util
{
    /**
     * @var Loader
     */
    protected $loader;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->loader = new Loader();
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
        return $this->loader
            ->getProvider($iso)
            ->isHoliday($this->getDateTime($date), $state);
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
        return $this->loader
            ->getProvider($iso)
            ->getHoliday($this->getDateTime($date), $state);
    }

}
