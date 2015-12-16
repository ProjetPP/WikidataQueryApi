<?php

namespace WikidataQueryApi;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

/**
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class WikidataQueryApi {

	/**
	 * @var string
	 */
	private $apiUrl;

	/**
	 * @var ClientInterface
	 */
	private $client;

	/**
	 * @param string $apiUrl the URL of the Wikidata Query API
	 * @param ClientInterface|null $client the Guzzle client to use
	 */
	public function __construct( $apiUrl, ClientInterface $client = null ) {
		if( $client === null ) {
			$client = new Client();
		}

		$this->apiUrl = $apiUrl;
		$this->client = $client;
	}

	/**
	 * @param array $params
	 * @return array
	 *
	 * @throws WikibaseQueryApiException
	 */
	public function doQuery( $params ) {
		$result = json_decode( $this->client->get(
			$this->apiUrl,
			[ 'query' => $params ]
		)->getBody(), true );

		if ( $result['status']['error'] !== 'OK' ) {
			throw new WikibaseQueryApiException( $result['status']['error'] );
		}

		return $result;
	}
}
