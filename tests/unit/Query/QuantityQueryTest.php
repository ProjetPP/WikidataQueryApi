<?php

namespace WikidataQueryApi\Query;

use DataValues\DecimalValue;
use Wikibase\DataModel\Entity\PropertyId;

/**
 * @covers WikidataQueryApi\Query\QuantityQuery
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class QuantityQueryTest extends \PHPUnit_Framework_TestCase {

	public function testGetPropertyId() {
		$query = new QuantityQuery( new PropertyId( 'P42' ), new DecimalValue( '+42' ) );
		$this->assertEquals( new PropertyId( 'P42' ), $query->getPropertyId() );
	}

	public function testGetLowerValue() {
		$query = new QuantityQuery( new PropertyId( 'P42' ), new DecimalValue( '+41' ), new DecimalValue( '+43' ) );
		$this->assertEquals(
			new DecimalValue( '+41' ),
			$query->getLowerValue()
		);
	}

	public function testGetUpperValue() {
		$query = new QuantityQuery( new PropertyId( 'P42' ), new DecimalValue( '+41' ), new DecimalValue( '+43' ) );
		$this->assertEquals(
			new DecimalValue( '+43' ),
			$query->getUpperValue()
		);
	}

	public function testGetType() {
		$query = new QuantityQuery( new PropertyId( 'P42' ), new DecimalValue( '+42' ) );
		$this->assertEquals( 'quantity', $query->getType() );
	}
}
