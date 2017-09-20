<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class DKTest
 */
class DKTest extends AbstractTest
{
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
            array('2016-01-01', null, array('name' => 'Nytår')),
            array('2016-03-24', null, array('name' => 'Skærtorsdag')),
            array('2016-03-25', null, array('name' => 'Langfredag')),
            array('2016-03-27', null, array('name' => 'Påskedag')),
            array('2016-03-28', null, array('name' => '2. Påskedag')),
            array('2016-04-22', null, array('name' => 'Store Bededag')),
            array('2016-05-05', null, array('name' => 'Kristi Himmelfartsdag')),
            array('2016-05-15', null, array('name' => 'Pinsedag')),
            array('2016-05-16', null, array('name' => '2. Pinsedag')),
            array('2016-12-25', null, array('name' => '1. Juledag')),
            array('2016-12-26', null, array('name' => '2. Juledag')),
        );
    }
}
