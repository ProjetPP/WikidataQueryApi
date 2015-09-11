<?php

namespace WikidataQueryApi\Query\Serializers;

use DataValues\TimeValue;
use Wikibase\DataModel\Entity\PropertyId;
use WikidataQueryApi\Query\BetweenQuery;

/**
 * @covers WikidataQueryApi\Query\Serializers\BetweenQuerySerializer
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class BetweenQuerySerializerTest extends SerializerBaseTest {

	public function buildSerializer() {
		return new BetweenQuerySerializer();
	}

	public function serializableProvider() {
		return [
			[
				new BetweenQuery(
					new PropertyId( 'P42' ),
					new TimeValue( '+1952-03-11T00:00:00Z', 0, 0, 0, TimeValue::PRECISION_DAY, 'foo' ),
					new TimeValue( '+1952-03-12T00:00:00Z', 0, 0, 0, TimeValue::PRECISION_DAY, 'foo' )
				)
			],
			[
				new BetweenQuery(
					new PropertyId( 'P42' ),
					new TimeValue( '+1952-03-11T00:00:00Z', 0, 0, 0, TimeValue::PRECISION_DAY, 'foo' )
				)
			],
			[
				new BetweenQuery(
					new PropertyId( 'P42' ),
					null,
					new TimeValue( '+1952-03-12T00:00:00Z', 0, 0, 0, TimeValue::PRECISION_DAY, 'foo' )
				)
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
				new TimeValue( '+1952-03-12T00:00:00Z', 0, 0, 0, TimeValue::PRECISION_DAY, 'foo' )
			],
		];
	}

	public function serializationProvider() {
		return [
			[
				'between[42,+1952-03-11T00:00:00Z,+1952-03-12T00:00:00Z]',
				new BetweenQuery(
					new PropertyId( 'P42' ),
					new TimeValue( '+1952-03-11T00:00:00Z', 0, 0, 0, TimeValue::PRECISION_DAY, 'foo' ),
					new TimeValue( '+1952-03-12T00:00:00Z', 0, 0, 0, TimeValue::PRECISION_DAY, 'foo' )
				)
			],
			[
				'between[42,+1952-03-11T00:00:00Z]',
				new BetweenQuery(
					new PropertyId( 'P42' ),
					new TimeValue( '+1952-03-11T00:00:00Z', 0, 0, 0, TimeValue::PRECISION_DAY, 'foo' )
				)
			],
			[
				'between[42,,+1952-03-12T00:00:00Z]',
				new BetweenQuery(
					new PropertyId( 'P42' ),
					null,
					new TimeValue( '+1952-03-12T00:00:00Z', 0, 0, 0, TimeValue::PRECISION_DAY, 'foo' )
				)
			],
		];
	}
}
