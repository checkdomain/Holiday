<?php

namespace Checkdomain\Holiday\Model;

/**
 * Class Holiday
 */
class Holiday
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var array|null
     */
    protected $states;

    /**
     * @var array|null
     */
    protected $excludedStates;

    /**
     * @param string $name
     *
     * @return Holiday
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \DateTime $date
     *
     * @return Holiday
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param array|null $states
     *
     * @return Holiday
     */
    public function setStates(array $states = null)
    {
        $this->states = $states;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getStates()
    {
        return $this->states;
    }

    /**
     * @param array|null $excludedStates
     *
     * @return Holiday
     */
    public function setExcludedStates(array $excludedStates = null)
    {
        $this->excludedStates = $excludedStates;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getExcludedStates()
    {
        return $this->excludedStates;
    }

    /**
     * @param string $state
     *
     * @return bool
     */
    public function appliesToState($state)
    {
        if (is_array($this->getStates())) {
            return array_search($state, $this->getStates()) > -1;
        }

        if (is_array($this->getExcludedStates())) {
            return array_search($state, $this->getExcludedStates()) == -1;
        }

        return true;
    }
}
