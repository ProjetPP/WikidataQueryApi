<?php

namespace WikidataQueryApi;

/**
 * @covers WikidataQueryApi\WikidataQueryApi
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class WikidataQueryApiTest extends \PHPUnit_Framework_TestCase {

	public function testDoQuery() {
		$clientMock = $this->getMock( 'WikidataQueryApi\Guzzle\WikidataQueryApiClient' );
		$clientMock->expects( $this->any() )
			->method( 'apiGet' )
			->with( $this->equalTo( [
				'q' => 'claim[42:42]'
			] ) )
			->will( $this->returnValue( [
				'status' => [ 'error' => 'OK' ],
				'items' => [ 42 ]
			] ) );

		$wikidataQueryApi = new WikidataQueryApi( $clientMock );
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
		$clientMock = $this->getMock( 'WikidataQueryApi\Guzzle\WikidataQueryApiClient' );
		$clientMock->expects( $this->any() )
			->method( 'apiGet' )
			->with( $this->equalTo( [
				'q' => 'claim[42:42]'
			] ) )
			->will( $this->returnValue( [
				'status' => [ 'error' => 'Error' ]
			] ) );

		$wikidataQueryApi = new WikidataQueryApi( $clientMock );

		$this->setExpectedException( 'WikidataQueryApi\WikibaseQueryApiException' );
		$wikidataQueryApi->doQuery( [
			'q' => 'claim[42:42]'
		] );
	}
}
