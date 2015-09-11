<?php

namespace WikidataQueryApi\Query\Serializers;

use DataValues\StringValue;
use Wikibase\DataModel\Entity\PropertyId;
use WikidataQueryApi\Query\AndQuery;
use WikidataQueryApi\Query\StringQuery;

/**
 * @covers WikidataQueryApi\Query\Serializers\QuerySerializer
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class QuerySerializerTest extends SerializerBaseTest {

	public function buildSerializer() {
		return new QuerySerializer( new StringQuerySerializer() );
	}

	public function serializableProvider() {
		return [
			[
				new StringQuery( new PropertyId( 'P42' ), new StringValue( 'foo' ) )
			],
			[
				new AndQuery( [ new StringQuery( new PropertyId( 'P42' ), new StringValue( 'foo' ) ) ] )
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
		];
	}

	public function serializationProvider() {
		return [
			[
				'string[42:"foo"]',
				new StringQuery( new PropertyId( 'P42' ), new StringValue( 'foo' ) )
			],
			[
				'(string[42:"foo"] AND string[43:"bar"])',
				new AndQuery([
					new StringQuery( new PropertyId( 'P42' ), new StringValue( 'foo' ) ),
					new StringQuery( new PropertyId( 'P43' ), new StringValue( 'bar' ) )
				] )
			],
		];
	}
}
