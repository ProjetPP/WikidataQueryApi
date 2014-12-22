<?php

namespace WikidataQueryApi\Query;

/**
 * @covers WikidataQueryApi\Query\AndQuery
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class AndQueryTest extends \PHPUnit_Framework_TestCase {

	public function testGetSubQueries() {
		$query = new AndQuery( array() );
		$this->assertEquals( array(), $query->getSubQueries() );
	}

	public function testGetType() {
		$query = new AndQuery( array() );
		$this->assertEquals( 'AND', $query->getType() );
	}
}
