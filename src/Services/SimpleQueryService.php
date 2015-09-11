<?php

namespace WikidataQueryApi\Services;

use Serializers\Serializer;
use Wikibase\DataModel\Entity\ItemId;
use WikidataQueryApi\Query\AbstractQuery;
use WikidataQueryApi\WikibaseQueryApiException;
use WikidataQueryApi\WikidataQueryApi;

/**
 * Simple service that returns a list of ItemId for a given query.
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class SimpleQueryService {

	/**
	 * @var WikidataQueryApi
	 */
	private $api;

	/**
	 * @var Serializer
	 */
	private $querySerializer;

	/**
	 * @param WikidataQueryApi $api
	 * @param Serializer $querySerializer
	 */
	public function __construct( WikidataQueryApi $api, Serializer $querySerializer ) {
		$this->api = $api;
		$this->querySerializer = $querySerializer;
	}

	/**
	 * @param AbstractQuery $query
	 * @return ItemId[]
	 *
	 * @throws WikibaseQueryApiException
	 */
	public function doQuery( AbstractQuery $query ) {
		$result = $this->api->doQuery( [
			'q' => $this->querySerializer->serialize( $query )
		] );

		return $this->parseItemList( $result['items'] );
	}

	private function parseItemList( array $itemNumericIds ) {
		$itemIds = [];

		foreach ( $itemNumericIds as $itemNumericId ) {
			$itemIds[] = ItemId::newFromNumber( $itemNumericId );
		}

		return $itemIds;
	}
}
