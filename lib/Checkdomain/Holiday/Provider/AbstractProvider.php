<?php

namespace Checkdomain\Holiday\Provider;

use Checkdomain\Holiday\Model\Holiday;
use Checkdomain\Holiday\ProviderInterface;

/**
 * Class AbstractProvider
 */
abstract class AbstractProvider implements ProviderInterface
{

    const DATE_FORMAT = 'm-d';

    /**
     * @param \DateTime $date
     * @param string    $state
     *
     * @return Holiday
     */
    public function getHolidayByDate(\DateTime $date, $state = null)
    {
        $day = $date->format(self::DATE_FORMAT);

        $holidays = $this->getHolidaysByYear(intval($date->format('Y')));

        if (isset($holidays[$day])) {
            $holiday = $this->createModelFromData($holidays[$day], $date);

            if (!$this->hasState($holiday, $state)) {
                $holiday = null;
            }

            return $holiday;
        }

        return null;
    }

    /**
     * @param array     $data
     * @param \DateTime $date
     *
     * @return Holiday
     */
    protected function createModelFromData(array $data, \DateTime $date)
    {
        $holiday = new Holiday(
            $data['name'],
            $date,
            $data['states']
        );

        return $holiday;
    }

    /**
     * @param Holiday $holiday
     * @param string  $state
     *
     * @return bool
     */
    protected function hasState(Holiday $holiday, $state = null)
    {
        if ($state === null) {
            return true;
        }

        $states = $holiday->getStates();
        if (empty($states)) {
            return true;
        }

        if (is_array($states) && in_array($state, $states)) {
            return true;
        }

        return false;
    }

    /**
     * @param string $name
     * @param array  $states
     *
     * @return array
     */
    protected function createData($name, array $states = null)
    {
        return array(
            'name'     => $name,
            'states'   => $states
        );
    }

}
