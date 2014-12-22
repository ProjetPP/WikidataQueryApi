<?php

namespace WikidataQueryApi\Query;

/**
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class OrQuery extends CollectionQuery {

	/**
	 * @see AbstractQuery::getType
	 */
	public function getType() {
		return 'OR';
	}
}
