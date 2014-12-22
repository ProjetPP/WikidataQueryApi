<?php

namespace WikidataQueryApi\Query;

/**
 * @covers WikidataQueryApi\Query\OrQuery
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class OrQueryTest extends \PHPUnit_Framework_TestCase {

	public function testGetSubQueries() {
		$query = new OrQuery( array() );
		$this->assertEquals( array(), $query->getSubQueries() );
	}

	public function testGetType() {
		$query = new OrQuery( array() );
		$this->assertEquals( 'OR', $query->getType() );
	}
}
