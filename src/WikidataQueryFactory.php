<?php

namespace WikidataQueryApi;

use Serializers\DispatchingSerializer;
use WikidataQueryApi\Query\Serializers\AroundQuerySerializer;
use WikidataQueryApi\Query\Serializers\BetweenQuerySerializer;
use WikidataQueryApi\Query\Serializers\ClaimQuerySerializer;
use WikidataQueryApi\Query\Serializers\QuerySerializer;
use WikidataQueryApi\Query\Serializers\StringQuerySerializer;
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
		return new QuerySerializer( new DispatchingSerializer( [
			new ClaimQuerySerializer(),
			new StringQuerySerializer(),
			new AroundQuerySerializer(),
			new BetweenQuerySerializer()
		] ) );
	}
}
