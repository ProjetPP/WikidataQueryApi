<?php

namespace WikidataQueryApi\DataModel\Serializers;

use DataValues\Geo\Values\GlobeCoordinateValue;
use DataValues\Geo\Values\LatLongValue;
use Wikibase\DataModel\Entity\PropertyId;
use WikidataQueryApi\DataModel\AroundQuery;

/**
 * @covers WikidataQueryApi\DataModel\Serializers\AroundQuerySerializer
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class AroundQuerySerializerTest extends SerializerBaseTest {

	public function buildSerializer() {
		return new AroundQuerySerializer();
	}

	public function serializableProvider() {
		return array(
			array(
				new AroundQuery( new PropertyId( 'P42' ), new LatLongValue( 42, 42 ), 1 )
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
				new GlobeCoordinateValue( new LatLongValue( 42, 42 ), 1 )
			),
		);
	}

	public function serializationProvider() {
		return array(
			array(
				'around[42,42,42,1]',
				new AroundQuery( new PropertyId( 'P42' ), new LatLongValue( 42, 42 ), 1 )
			),
		);
	}
}
