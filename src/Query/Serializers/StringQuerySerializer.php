<?php

namespace WikidataQueryApi\Query\Serializers;

use Serializers\DispatchableSerializer;
use Serializers\Exceptions\UnsupportedObjectException;
use WikidataQueryApi\Query\StringQuery;

/**
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class StringQuerySerializer implements DispatchableSerializer {

	/**
	 * @see DispatchableSerializer::isSerializerFor
	 */
	public function isSerializerFor( $object ) {
		return is_object( $object ) && $object instanceof StringQuery;
	}

	/**
	 * @see Serializer::serialize
	 */
	public function serialize( $object ) {
		if ( !$this->isSerializerFor( $object ) ) {
			throw new UnsupportedObjectException(
				$object,
				'StringQuerySerializer can only serialize StringQuery objects'
			);
		}

		return $this->getSerialized( $object );
	}

	private function getSerialized( StringQuery $query ) {
		return 'string[' . $query->getPropertyId()->getNumericId() . ':"' . $query->getStringValue()->getValue() . '"]';
	}
}
