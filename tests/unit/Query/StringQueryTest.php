<?php

namespace WikidataQueryApi\Query;

use DataValues\StringValue;
use Wikibase\DataModel\Entity\PropertyId;

/**
 * @covers WikidataQueryApi\Query\StringQuery
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class StringQueryTest extends \PHPUnit_Framework_TestCase {

	public function testGetPropertyId() {
		$query = new StringQuery( new PropertyId( 'P42' ), new StringValue( 'foo' ) );
		$this->assertEquals( new PropertyId( 'P42' ), $query->getPropertyId() );
	}

	public function testGetStringValue() {
		$query = new StringQuery( new PropertyId( 'P42' ), new StringValue( 'foo' ) );
		$this->assertEquals( new StringValue( 'foo' ), $query->getStringValue() );
	}

	public function testGetType() {
		$query = new StringQuery( new PropertyId( 'P42' ), new StringValue( 'foo' ) );
		$this->assertEquals( 'string', $query->getType() );
	}
}
