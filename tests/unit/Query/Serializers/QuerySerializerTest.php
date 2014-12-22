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
		return array(
			array(
				new StringQuery( new PropertyId( 'P42' ), new StringValue( 'foo' ) )
			),
			array(
				new AndQuery( array( new StringQuery( new PropertyId( 'P42' ), new StringValue( 'foo' ) ) ) )
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
		);
	}

	public function serializationProvider() {
		return array(
			array(
				'string[42:"foo"]',
				new StringQuery( new PropertyId( 'P42' ), new StringValue( 'foo' ) )
			),
			array(
				'(string[42:"foo"] AND string[43:"bar"])',
				new AndQuery(array(
					new StringQuery( new PropertyId( 'P42' ), new StringValue( 'foo' ) ),
					new StringQuery( new PropertyId( 'P43' ), new StringValue( 'bar' ) )
				) )
			),
		);
	}
}
