<?php
/**
 * Norwegian holiday provider
 * 
 * @author Kristian Lunde <kristian@klunde.net>
 * @since 2014-04-18
 */
namespace Checkdomain\Holiday\Provider;

/**
 * Class NOTest
 */
class NOTest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->provider = new NO();
    }

    /**
     * Provides some test dates and the expectation
     *
     * @return array
     */
    public function dateProvider()
    {
        return array(
			#Test holidays in past years
            array('2010-03-21', null, null),
			array('2010-01-01', null, array('name' => '1. nyttårsdag')),
			
			array('2010-04-01', null, array('name' => 'Skjærtorsdag')),
			array('2010-04-02', null, array('name' => 'Langfredag')),
			array('2010-04-04', null, array('name' => '1. påskedag')),
			array('2010-04-05', null, array('name' => '2. påskedag')),
			
			array('2010-05-01', null, array('name' => '1. mai')),
			array('2010-05-13', null, array('name' => 'Kristi Himmelfartsdag')),
			array('2010-05-17', null, array('name' => 'Grunnlovsdagen')),
			
			array('2010-05-24', null, array('name' => '2. pinsedag')),

			array('2010-12-25', null, array('name' => '1. juledag')),
			array('2010-12-26', null, array('name' => '2. juledag')),

			#Test current year, (when writing these tests)
			array('2014-03-21', null, null),
			array('2014-01-01', null, array('name' => '1. nyttårsdag')),
			
			array('2014-04-17', null, array('name' => 'Skjærtorsdag')),
			array('2014-04-18', null, array('name' => 'Langfredag')),
			array('2014-04-20', null, array('name' => '1. påskedag')),
			array('2014-04-21', null, array('name' => '2. påskedag')),
			
			array('2014-05-01', null, array('name' => '1. mai')),
			array('2014-05-29', null, array('name' => 'Kristi Himmelfartsdag')),
			array('2014-05-17', null, array('name' => 'Grunnlovsdagen')),
			
			array('2014-06-09', null, array('name' => '2. pinsedag')),

			array('2014-12-25', null, array('name' => '1. juledag')),
			array('2014-12-26', null, array('name' => '2. juledag')),


			#Test in the future
			array('2016-03-21', null, null),
			array('2016-01-01', null, array('name' => '1. nyttårsdag')),
			
			array('2016-03-24', null, array('name' => 'Skjærtorsdag')),
			array('2016-03-25', null, array('name' => 'Langfredag')),
			array('2016-03-27', null, array('name' => '1. påskedag')),
			array('2016-03-28', null, array('name' => '2. påskedag')),
			
			array('2016-05-01', null, array('name' => '1. mai')),
			array('2016-05-05', null, array('name' => 'Kristi Himmelfartsdag')),
			array('2016-05-17', null, array('name' => 'Grunnlovsdagen')),
			
			array('2016-05-16', null, array('name' => '2. pinsedag')),

			array('2016-12-25', null, array('name' => '1. juledag')),
			array('2016-12-26', null, array('name' => '2. juledag')),
        );
    }
}
