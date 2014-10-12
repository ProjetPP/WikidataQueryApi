<?php

namespace WikidataQueryApi\DataModel;

use DataValues\Geo\Values\LatLongValue;
use Wikibase\DataModel\Entity\PropertyId;

/**
 * @covers WikidataQueryApi\DataModel\AroundQuery
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class AroundQueryTest extends \PHPUnit_Framework_TestCase {

	public function testGetPropertyId() {
		$query = new AroundQuery( new PropertyId( 'P42' ), new LatLongValue( 42, 42 ), 1 );
		$this->assertEquals( new PropertyId( 'P42' ), $query->getPropertyId() );
	}

	public function testGetLatLongValue() {
		$query = new AroundQuery( new PropertyId( 'P42' ), new LatLongValue( 42, 42 ), 1 );
		$this->assertEquals( new LatLongValue( 42, 42 ), $query->getLatLongValue() );
	}

	public function testRadius() {
		$query = new AroundQuery( new PropertyId( 'P42' ), new LatLongValue( 42, 42 ), 1 );
		$this->assertEquals( 1, $query->getRadius() );
	}

	public function testGetType() {
		$query = new AroundQuery( new PropertyId( 'P42' ), new LatLongValue( 42, 42 ), 1 );
		$this->assertEquals( 'around', $query->getType() );
	}
}
