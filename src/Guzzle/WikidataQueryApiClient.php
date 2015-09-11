<?php

namespace WikidataQueryApi\Guzzle;

use Guzzle\Common\Collection;
use Guzzle\Http\Client;

/**
 * Guzzle client for WikidataQuery
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class WikidataQueryApiClient extends Client {

	public static function factory( $config = [] ) {
		$required = [ 'base_url' ];
		$config = Collection::fromConfig( $config, [], $required );

		$client = new self( $config->get( 'base_url' ) );
		$client->setConfig( $config );

		$client->setUserAgent( 'ppp-wikidataquery-api' );

		return $client;
	}

	/**
	 * Do a GET request to the API
	 *
	 * @param string[] $params parameters to put in the query part of the url
	 * @return array the API result
	 */
	public function apiGet( $params ) {
		return $this->get( null, null, [
			'query' => $params
		] )->send()->json();
	}
}
