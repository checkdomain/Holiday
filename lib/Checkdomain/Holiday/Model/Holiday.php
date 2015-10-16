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
     * @var array
     */
    protected $states;

    /**
     * Constructor
     *
     * @param string    $name
     * @param \DateTime $date
     * @param array     $states
     */
    public function __construct($name = null, \DateTime $date = null, array $states = null)
    {
        $this->name     = $name;
        $this->date     = $date;
        $this->states   = $states;
    }

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
     * @param array $states
     *
     * @return Holiday
     */
    public function setStates(array $states)
    {
        $this->states = $states;

        return $this;
    }

    /**
     * @return array
     */
    public function getStates()
    {
        return $this->states;
    }

}
