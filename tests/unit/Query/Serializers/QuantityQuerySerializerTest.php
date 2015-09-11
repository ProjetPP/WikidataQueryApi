<?php

namespace WikidataQueryApi\Query\Serializers;

use DataValues\DecimalValue;
use Wikibase\DataModel\Entity\PropertyId;
use WikidataQueryApi\Query\QuantityQuery;

/**
 * @covers WikidataQueryApi\Query\Serializers\QuantityQuerySerializer
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class QuantityQuerySerializerTest extends SerializerBaseTest {

	public function buildSerializer() {
		return new QuantityQuerySerializer();
	}

	public function serializableProvider() {
		return [
			[
				new QuantityQuery( new PropertyId( 'P42' ), new DecimalValue( '+41' ), new DecimalValue( '+43' ) )
			],
			[
				new QuantityQuery( new PropertyId( 'P42' ), new DecimalValue( '+42' ) )
			],
		];
	}

	public function nonSerializableProvider() {
		return [
			[
				5
			],
			[
				[]
			],
			[
				new DecimalValue( '+43' )
			],
		];
	}

	public function serializationProvider() {
		return [
			[
				'quantity[42,+41,+43]',
				$query = new QuantityQuery( new PropertyId( 'P42' ), new DecimalValue( '+41' ), new DecimalValue( '+43' ) )
			],
			[
				'quantity[42,+42]',
				$query = new QuantityQuery( new PropertyId( 'P42' ), new DecimalValue( '+42' ) )
			],
		];
	}
}
