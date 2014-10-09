<?php

namespace WikidataQueryApi\Services;

use Serializers\Serializer;
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
	public function __construct (WikidataQueryApi $api, Serializer $querySerializer ) {
		$this->api = $api;
		$this->querySerializer = $querySerializer;
	}


}
