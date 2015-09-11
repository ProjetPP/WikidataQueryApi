<?php

namespace WikidataQueryApi\Query\Serializers;

use Serializers\DispatchableSerializer;
use Serializers\Exceptions\UnsupportedObjectException;
use Serializers\Serializer;
use WikidataQueryApi\Query\AbstractQuery;
use WikidataQueryApi\Query\CollectionQuery;

/**
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class QuerySerializer implements DispatchableSerializer {

	/**
	 * @var Serializer
	 */
	private $commandsSerializer;

	/**
	 * @param Serializer $commandsSerializer
	 */
	public function __construct( Serializer $commandsSerializer ) {
		$this->commandsSerializer = $commandsSerializer;
	}

	/**
	 * @see DispatchableSerializer::isSerializerFor
	 */
	public function isSerializerFor( $object ) {
		return is_object( $object ) && $object instanceof AbstractQuery;
	}

	/**
	 * @see Serializer::serialize
	 */
	public function serialize( $object ) {
		if ( !$this->isSerializerFor( $object ) ) {
			throw new UnsupportedObjectException(
				$object,
				'QuerySerializer can only serialize AbstractQuery objects'
			);
		}

		return $this->getSerialized( $object );
	}

	private function getSerialized( AbstractQuery $query ) {
		if ( $query instanceof CollectionQuery ) {
			return '(' . implode( ' ' . $query->getType() . ' ', $this->serializeQueries( $query->getSubQueries() ) ) . ')';
		}

		return $this->commandsSerializer->serialize( $query );
	}

	private function serializeQueries( array $queries ) {
		$serialized = [];

		foreach( $queries as $query ) {
			$serialized[] = $this->getSerialized( $query );
		}

		return $serialized;
	}
}