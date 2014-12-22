<?php

namespace WikidataQueryApi\Query;

/**
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
abstract class CollectionQuery extends AbstractQuery {

	/**
	 * @var AbstractQuery[]
	 */
	private $subQueries;

	/**
	 * @param AbstractQuery[] $subQueries
	 */
	public function __construct( array $subQueries ) {
		$this->subQueries = $subQueries;
	}

	/**
	 * @return AbstractQuery[]
	 */
	public function getSubQueries() {
		return $this->subQueries;
	}
}
