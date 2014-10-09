<?php

namespace WikidataQueryApi;

use Serializers\DispatchingSerializer;
use WikidataQueryApi\DataModel\Serializers\ClaimQuerySerializer;
use WikidataQueryApi\Services\SimpleQueryService;

/**
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class WikidataQueryFactory {

	/**
	 * @var WikidataQueryApi
	 */
	private $api;

	/**
	 * @param WikidataQueryApi $api
	 */
	public function __construct( WikidataQueryApi $api ) {
		$this->api = $api;
	}

	/**
	 * @return SimpleQueryService
	 */
	public function newSimpleQueryService() {
		return new SimpleQueryService( $this->api, $this->newQuerySerializer() );
	}

	private function newQuerySerializer() {
		return new DispatchingSerializer( array(
			new ClaimQuerySerializer()
		) );
	}
}
