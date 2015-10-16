<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class DE
 */
class DKTest extends AbstractTest
{
    /**
     * @var \Checkdomain\Holiday\Provider\DK
     */
    protected $provider;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new DK();
    }

    /**
     * Provides some test dates and the expectation
     *
     * @return array
     */
    public function dateProvider()
    {
        return array(
            array('01.01.2016', null, array('name' => 'Nytår')),
            array('24.03.2016', null, array('name' => 'Skærtorsdag')),
            array('25.03.2016', null, array('name' => 'Langfredag')),
            array('27.03.2016', null, array('name' => 'Påskedag')),
            array('28.03.2016', null, array('name' => '2. Påskedag')),
            array('22.04.2016', null, array('name' => 'Store Bededag')),
            array('05.05.2016', null, array('name' => 'Kristi Himmelfartsdag')),
            array('15.05.2016', null, array('name' => 'Pinsedag')),
            array('16.05.2016', null, array('name' => '2. Pinsedag')),
            array('25.12.2016', null, array('name' => '1. Juledag')),
            array('26.12.2016', null, array('name' => '2. Juledag')),
        );
    }
}
