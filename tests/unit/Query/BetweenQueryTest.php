<?php

namespace WikidataQueryApi\Query;

use DataValues\BetweenValue;
use DataValues\TimeValue;
use Wikibase\DataModel\Entity\PropertyId;

/**
 * @covers WikidataQueryApi\Query\BetweenQuery
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class BetweenQueryTest extends \PHPUnit_Framework_TestCase {

	public function testGetPropertyId() {
		$query = new BetweenQuery( new PropertyId( 'P42' ) );
		$this->assertEquals( new PropertyId( 'P42' ), $query->getPropertyId() );
	}

	public function testGetBeginValue() {
		$query = new BetweenQuery(
			new PropertyId( 'P42' ),
			new TimeValue( '+00000001952-03-11T00:00:00Z', 0, 0, 0, TimeValue::PRECISION_DAY, '' ),
			new TimeValue( '+00000001952-03-12T00:00:00Z', 0, 0, 0, TimeValue::PRECISION_DAY, '' )
		);
		$this->assertEquals(
			new TimeValue( '+00000001952-03-11T00:00:00Z', 0, 0, 0, TimeValue::PRECISION_DAY, '' ),
			$query->getBeginValue()
		);
	}


	public function testGetEndValue() {
		$query = new BetweenQuery(
			new PropertyId( 'P42' ),
			new TimeValue( '+00000001952-03-11T00:00:00Z', 0, 0, 0, TimeValue::PRECISION_DAY, '' ),
			new TimeValue( '+00000001952-03-12T00:00:00Z', 0, 0, 0, TimeValue::PRECISION_DAY, '' )
		);
		$this->assertEquals(
			new TimeValue( '+00000001952-03-12T00:00:00Z', 0, 0, 0, TimeValue::PRECISION_DAY, '' ),
			$query->getEndValue()
		);
	}

	public function testGetType() {
		$query = new BetweenQuery( new PropertyId( 'P42' ) );
		$this->assertEquals( 'between', $query->getType() );
	}
}
