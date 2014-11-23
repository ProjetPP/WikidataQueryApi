<?php

namespace WikidataQueryApi\Query\Serializers;

use DataValues\StringValue;
use Wikibase\DataModel\Entity\PropertyId;
use WikidataQueryApi\Query\StringQuery;

/**
 * @covers WikidataQueryApi\Query\Serializers\StringQuerySerializer
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class StringQuerySerializerTest extends SerializerBaseTest {

	public function buildSerializer() {
		return new StringQuerySerializer();
	}

	public function serializableProvider() {
		return array(
			array(
				new StringQuery( new PropertyId( 'P42' ), new StringValue( 'foo' ) )
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
				new StringValue( 'foo' )
			),
		);
	}

	public function serializationProvider() {
		return array(
			array(
				'string[42:"foo"]',
				new StringQuery( new PropertyId( 'P42' ), new StringValue( 'foo' ) )
			),
		);
	}
}
