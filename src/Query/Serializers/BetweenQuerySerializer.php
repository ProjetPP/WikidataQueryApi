<?php

namespace WikidataQueryApi\Query\Serializers;

use Serializers\DispatchableSerializer;
use Serializers\Exceptions\UnsupportedObjectException;
use WikidataQueryApi\Query\BetweenQuery;

/**
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class BetweenQuerySerializer implements DispatchableSerializer {

	/**
	 * @see DispatchableSerializer::isSerializerFor
	 */
	public function isSerializerFor( $object ) {
		return is_object( $object ) && $object instanceof BetweenQuery;
	}

	/**
	 * @see Serializer::serialize
	 */
	public function serialize( $object ) {
		if ( !$this->isSerializerFor( $object ) ) {
			throw new UnsupportedObjectException(
				$object,
				'BetweenQuerySerializer can only serialize BetweenQuery objects'
			);
		}

		return $this->getSerialized( $object );
	}

	private function getSerialized( BetweenQuery $query ) {
		$text = 'between[' . $query->getPropertyId()->getNumericId() . ',';

		if ( $query->getBeginValue() !== null ) {
			$text .= $query->getBeginValue()->getTime();
		}
		if ( $query->getEndValue() !== null ) {
			$text .= ',' . $query->getEndValue()->getTime();
		}

		return $text . ']';
	}
}
