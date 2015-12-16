<?php

namespace WikidataQueryApi;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

/**
 * @covers WikidataQueryApi\WikidataQueryApi
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class WikidataQueryApiTest extends \PHPUnit_Framework_TestCase {

	public function testDoQuery() {
		$mock = new MockHandler( [
			new Response(
				200,
				[],
				json_encode( [
					'status' => [ 'error' => 'OK' ],
					'items' => [ 42 ]
				] )
			)
		] );
		$handler = HandlerStack::create( $mock );
		$client = new Client( [ 'handler' => $handler ] );
		$wikidataQueryApi = new WikidataQueryApi( '', $client );

		$this->assertEquals(
			[
				'status' => [ 'error' => 'OK' ],
				'items' => [ 42 ]
			],
			$wikidataQueryApi->doQuery( [
				'q' => 'claim[42:42]'
			] )
		);
	}

	public function testDoQueryWithError() {
		$mock = new MockHandler( [
			new Response(
				200,
				[],
				json_encode( [
					'status' => [ 'error' => 'Error' ]
				] )
			)
		] );
		$handler = HandlerStack::create( $mock );
		$client = new Client( [ 'handler' => $handler ] );
		$wikidataQueryApi = new WikidataQueryApi( '', $client );

		$this->setExpectedException( 'WikidataQueryApi\WikibaseQueryApiException' );
		$wikidataQueryApi->doQuery( [
			'q' => 'claim[42:42]'
		] );
	}
}
