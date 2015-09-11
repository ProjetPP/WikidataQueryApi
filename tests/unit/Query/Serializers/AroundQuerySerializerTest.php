<?php

namespace WikidataQueryApi\Query\Serializers;

use DataValues\LatLongValue;
use Wikibase\DataModel\Entity\PropertyId;
use WikidataQueryApi\Query\AroundQuery;

/**
 * @covers WikidataQueryApi\Query\Serializers\AroundQuerySerializer
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class AroundQuerySerializerTest extends SerializerBaseTest {

	public function buildSerializer() {
		return new AroundQuerySerializer();
	}

	public function serializableProvider() {
		return [
			[
				new AroundQuery( new PropertyId( 'P42' ), new LatLongValue( 42, 42 ), 1 )
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
				new LatLongValue( 42, 42 )
			],
		];
	}

	public function serializationProvider() {
		return [
			[
				'around[42,42,42,1]',
				new AroundQuery( new PropertyId( 'P42' ), new LatLongValue( 42, 42 ), 1 )
			],
		];
	}
}
