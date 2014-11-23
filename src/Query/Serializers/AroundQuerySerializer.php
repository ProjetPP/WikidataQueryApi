<?php

namespace WikidataQueryApi\Query\Serializers;

use Serializers\DispatchableSerializer;
use Serializers\Exceptions\UnsupportedObjectException;
use WikidataQueryApi\Query\AroundQuery;

/**
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class AroundQuerySerializer implements DispatchableSerializer {

	/**
	 * @see DispatchableSerializer::isSerializerFor
	 */
	public function isSerializerFor( $object ) {
		return is_object( $object ) && $object instanceof AroundQuery;
	}

	/**
	 * @see Serializer::serialize
	 */
	public function serialize( $object ) {
		if ( !$this->isSerializerFor( $object ) ) {
			throw new UnsupportedObjectException(
				$object,
				'AroundQuerySerializer can only serialize AroundQuery objects'
			);
		}

		return $this->getSerialized( $object );
	}

	private function getSerialized( AroundQuery $query ) {
		return 'around[' .
			$query->getPropertyId()->getNumericId() . ',' .
			$query->getLatLongValue()->getLatitude() . ',' .
			$query->getLatLongValue()->getLongitude() . ',' .
			$query->getRadius() . ']';
	}
}
