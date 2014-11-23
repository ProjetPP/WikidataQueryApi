<?php

namespace WikidataQueryApi\Query\Serializers;

use Serializers\DispatchableSerializer;
use Serializers\Exceptions\UnsupportedObjectException;
use WikidataQueryApi\Query\QuantityQuery;

/**
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class QuantityQuerySerializer implements DispatchableSerializer {

	/**
	 * @see DispatchableSerializer::isSerializerFor
	 */
	public function isSerializerFor( $object ) {
		return is_object( $object ) && $object instanceof QuantityQuery;
	}

	/**
	 * @see Serializer::serialize
	 */
	public function serialize( $object ) {
		if ( !$this->isSerializerFor( $object ) ) {
			throw new UnsupportedObjectException(
				$object,
				'QuantityQuerySerializer can only serialize QuantityQuery objects'
			);
		}

		return $this->getSerialized( $object );
	}

	private function getSerialized( QuantityQuery $query ) {
		$text = 'quantity[' . $query->getPropertyId()->getNumericId() . ',';

		if ( $query->getLowerValue() !== null ) {
			$text .= $query->getLowerValue()->getValue();
		}
		if ( $query->getUpperValue() !== null ) {
			$text .= ',' . $query->getUpperValue()->getValue();
		}

		return $text . ']';
	}
}
