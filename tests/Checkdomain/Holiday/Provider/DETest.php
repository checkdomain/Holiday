<?php

namespace Checkdomain\Holiday\Provider;

/**
 * Class DETest
 */
class DETest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new DE();
    }

    /**
     * Provides some test dates and the expectation
     *
     * @return array
     */
    public function dateProvider()
    {
        return array(
            array('21.03.2013', null, null),
            array('01.01.2013', null, array('name' => 'Neujahr')),
            array('06.01.2013', DE::STATE_BY, array('name' => 'Heilige Drei Könige')),
            array('06.01.2013', DE::STATE_SH, null),
            array('19.06.2014', DE::STATE_HE, array('name' => 'Fronleichnam')),
            array('19.06.2014', DE::STATE_SH, null),
            array('01.11.2014', DE::STATE_BW, array('name' => 'Allerheiligen')),
            array('01.11.2014', DE::STATE_SH, null),
        );
    }
}
