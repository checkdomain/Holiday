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
     * @{@inheritdoc}
     */
    public function getHolidaysByYear($year, $state = null)
    {
        $holidays = array();

        foreach ($this->getHolidaysDataByYear($year) as $date => $data) {
            $holiday = $this->createModelFromData($data, new \DateTime($year . '-' . $date));

            if ($state === null || $holiday->appliesToState($state)) {
                $holidays[] = $holiday;
            }
        }

        return $holidays;
    }

    /**
     * @{@inheritdoc}
     */
    public function getHoliday(\DateTime $date, $state = null)
    {
        $day = $date->format(self::DATE_FORMAT);

        $holidays = $this->getHolidaysDataByYear($date->format('Y'));

        if (isset($holidays[$day])) {
            $holiday = $this->createModelFromData($holidays[$day], $date);

            if ($state && false === $holiday->appliesToState($state)) {
                $holiday = null;
            }

            return $holiday;
        }

        return null;
    }

    /**
     * @{@inheritdoc}
     */
    public function isHoliday(\DateTime $date, $state = null)
    {
        return null !== $this->getHoliday($date, $state);
    }

    /**
     * @{@inheritdoc}
     */
    public function getHolidayByDate(\DateTime $date, $state = null)
    {
        return $this->getHoliday($date, $state);
    }

    /**
     * @param array     $data
     * @param \DateTime $date
     *
     * @return Holiday
     */
    protected function createModelFromData(array $data, \DateTime $date)
    {
        $holiday = new Holiday;

        $holiday
            ->setName($data['name'])
            ->setDate($date)
            ->setStates($data['states'])
            ->setExcludedStates($data['excludedStates']);

        return $holiday;
    }

    /**
     * @param string     $name
     * @param array|null $states
     * @param array|null $excludedStates
     *
     * @return array
     */
    protected function createData($name, array $states = null, array $excludedStates = null)
    {
        return array(
            'name'           => $name,
            'states'         => $states,
            'excludedStates' => $excludedStates
        );
    }
}
