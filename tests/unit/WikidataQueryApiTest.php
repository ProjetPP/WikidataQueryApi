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
			->with( $this->equalTo( array(
				'q' => 'claim[42:42]'
			) ) )
			->will( $this->returnValue( array(
				'status' => array( 'error' => 'OK' ),
				'items' => array( 42 )
			) ) );

		$wikidataQueryApi = new WikidataQueryApi( $clientMock );
		$this->assertEquals(
			array(
				'status' => array( 'error' => 'OK' ),
				'items' => array( 42 )
			),
			$wikidataQueryApi->doQuery( array(
				'q' => 'claim[42:42]'
			) )
		);
	}

	public function testDoQueryWithError() {
		$clientMock = $this->getMock( 'WikidataQueryApi\Guzzle\WikidataQueryApiClient' );
		$clientMock->expects( $this->any() )
			->method( 'apiGet' )
			->with( $this->equalTo( array(
				'q' => 'claim[42:42]'
			) ) )
			->will( $this->returnValue( array(
				'status' => array( 'error' => 'Error' )
			) ) );

		$wikidataQueryApi = new WikidataQueryApi( $clientMock );

		$this->setExpectedException( 'WikidataQueryApi\WikibaseQueryApiException' );
		$wikidataQueryApi->doQuery( array(
			'q' => 'claim[42:42]'
		) );
	}
}
