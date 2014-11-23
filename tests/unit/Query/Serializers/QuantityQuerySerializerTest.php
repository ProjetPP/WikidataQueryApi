<?php

namespace WikidataQueryApi\Query\Serializers;

use DataValues\DecimalValue;
use Wikibase\DataModel\Entity\PropertyId;
use WikidataQueryApi\Query\QuantityQuery;

/**
 * @covers WikidataQueryApi\DataModel\Serializers\QuantityQuerySerializer
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class QuantityQuerySerializerTest extends SerializerBaseTest {

	public function buildSerializer() {
		return new QuantityQuerySerializer();
	}

	public function serializableProvider() {
		return array(
			array(
				new QuantityQuery( new PropertyId( 'P42' ), new DecimalValue( '+41' ), new DecimalValue( '+43' ) )
			),
			array(
				new QuantityQuery( new PropertyId( 'P42' ), new DecimalValue( '+42' ) )
			),
		);
	}

	public function nonSerializableProvider() {
		return array(
			array(
				5
			),
			array(
				array()
			),
			array(
				new DecimalValue( '+43' )
			),
		);
	}

	public function serializationProvider() {
		return array(
			array(
				'quantity[42,+41,+43]',
				$query = new QuantityQuery( new PropertyId( 'P42' ), new DecimalValue( '+41' ), new DecimalValue( '+43' ) )
			),
			array(
				'quantity[42,+42]',
				$query = new QuantityQuery( new PropertyId( 'P42' ), new DecimalValue( '+42' ) )
			),
		);
	}
}
