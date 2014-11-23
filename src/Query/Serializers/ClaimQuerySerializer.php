<?php

namespace WikidataQueryApi\Query\Serializers;

use Serializers\DispatchableSerializer;
use Serializers\Exceptions\UnsupportedObjectException;
use WikidataQueryApi\Query\ClaimQuery;

/**
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class ClaimQuerySerializer implements DispatchableSerializer {

	/**
	 * @see DispatchableSerializer::isSerializerFor
	 */
	public function isSerializerFor( $object ) {
		return is_object( $object ) && $object instanceof ClaimQuery;
	}

	/**
	 * @see Serializer::serialize
	 */
	public function serialize( $object ) {
		if ( !$this->isSerializerFor( $object ) ) {
			throw new UnsupportedObjectException(
				$object,
				'ClaimQuerySerializer can only serialize ClaimQuery objects'
			);
		}

		return $this->getSerialized( $object );
	}

	private function getSerialized( ClaimQuery $query ) {
		$text = 'claim[' . $query->getPropertyId()->getNumericId();

		if ( $query->getItemId() !== null ) {
			$text .= ':' . $query->getItemId()->getNumericId();
		}

		return $text . ']';
	}
}
