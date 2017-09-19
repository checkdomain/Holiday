<?php
/**
 * Italian holiday provider
 * 
 * @author Giorgio Cefaro <giorgio.cefaro@gmail.com>
 * @since 2015-03-11
 */
namespace Checkdomain\Holiday\Provider;

/**
 * Class ITTest
 */
class ITTest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new IT();
    }

    /**
     * Provides some test dates and the expectation
     *
     * @return array
     */
    public function dateProvider()
    {
        return array(
			array('2010-01-01', null, array('name' => 'Capodanno')),

            array('2014-04-24', null, null),
            array('2014-04-25', null, array('name' => 'Liberazione dal nazifascismo (1945)')),
            array('2014-01-01', null, array('name' => 'Capodanno')),

            array('2014-04-20', null, array('name' => 'Pasqua')),
            array('2014-04-21', null, array('name' => 'Lunedì di Pasqua')),

            array('2016-12-25', null, array('name' => 'Natale di Gesù')),
            array('2016-12-26', null, array('name' => 'Santo Stefano')),

            array('2016-06-02', null, array('name' => 'Festa della Repubblica')),
            array('2016-08-15', null, array('name' => 'Assunzione di Maria')),
        );
    }
}
