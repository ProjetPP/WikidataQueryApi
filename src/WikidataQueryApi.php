<?php

namespace WikidataQueryApi;

use InvalidArgumentException;
use WikidataQueryApi\Guzzle\WikidataQueryApiClient;

/**
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class WikidataQueryApi {

	/**
	 * @var WikidataQueryApiClient
	 */
	private $client;

	/**
	 * @param string|WikidataQueryApiClient $client either the url or the api or a custom Client
	 */
	public function __construct( $client, $session = null ) {
		if ( is_string( $client ) ) {
			$client = WikidataQueryApiClient::factory( array( 'base_url' => $client ) );
		}
		if ( !( $client instanceof WikidataQueryApiClient ) ) {
			throw new InvalidArgumentException();
		}

		$this->client = $client;
	}

	/**
	 * @param array $params
	 * @return array
	 *
	 * @throws WikibaseQueryApiException
	 */
	public function doQuery( $params ) {
		$result = $this->client->apiGet( $params );

		if ( $result['status']['error'] != 'OK' ) {
			throw new WikibaseQueryApiException( $result['status']['error'] );
		}

		return $result;
	}
}
