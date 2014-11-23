<?php

namespace WikidataQueryApi\Query\Serializers;

use Wikibase\DataModel\Entity\ItemId;
use Wikibase\DataModel\Entity\PropertyId;
use WikidataQueryApi\Query\ClaimQuery;

/**
 * @covers WikidataQueryApi\Query\Serializers\ClaimQuerySerializer
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class ClaimQuerySerializerTest extends SerializerBaseTest {

	public function buildSerializer() {
		return new ClaimQuerySerializer();
	}

	public function serializableProvider() {
		return array(
			array(
				new ClaimQuery( new PropertyId( 'P42' ), new ItemId( 'Q42' ) )
			),
			array(
				new ClaimQuery( new PropertyId( 'P42' ) )
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
				new ItemId( 'Q42' )
			),
		);
	}

	public function serializationProvider() {
		return array(
			array(
				'claim[42:42]',
				new ClaimQuery( new PropertyId( 'P42' ), new ItemId( 'Q42' ) )
			),
			array(
				'claim[42]',
				new ClaimQuery( new PropertyId( 'P42' ) )
			),
		);
	}
}
