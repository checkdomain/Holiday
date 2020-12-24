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
            array('2013-03-21', null, null),
            array('2013-01-01', null, array('name' => 'Neujahr')),
            array('2013-01-06', DE::STATE_BY, array('name' => 'Heilige Drei Könige')),
            array('2013-01-06', DE::STATE_SH, null),
            array('2014-06-19', DE::STATE_HE, array('name' => 'Fronleichnam')),
            array('2014-06-19', DE::STATE_SH, null),
            array('2014-11-01', DE::STATE_BW, array('name' => 'Allerheiligen')),
            array('2014-11-01', DE::STATE_SH, null),
            array('2016-10-31', DE::STATE_SH, array('name' => 'Reformationstag')),
            array('2016-10-31', DE::STATE_BB, array('name' => 'Reformationstag')),
            array('2017-10-31', DE::STATE_SH, array('name' => 'Reformationstag')),
            array('2017-10-31', DE::STATE_BB, array('name' => 'Reformationstag')),
            array('2018-10-31', DE::STATE_SH, array('name' => 'Reformationstag')),
            array('2018-11-21', DE::STATE_BB, null),
            array('2018-11-21', DE::STATE_SN, array('name' => 'Buß- und Bettag')),
            array('2020-05-08', DE::STATE_BE, array('name' => 'Tag der Befreiung')),
            array('2021-05-08', DE::STATE_BE, array('states' => null)),
            array('2018-03-08', DE::STATE_BE, null),
            array('2019-03-08', DE::STATE_BE, array('name' => 'Internationaler Frauentag')),
            array('2021-03-08', DE::STATE_BE, array('name' => 'Internationaler Frauentag')),
            array('2021-03-08', DE::STATE_BY, null),
        );
    }
}
