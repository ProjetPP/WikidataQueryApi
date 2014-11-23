<?php

namespace WikidataQueryApi\Query;

/**
 * Base class for all queries.
 *
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
abstract class AbstractQuery {

	/**
	 * Returns the type of query like "noclaim"
	 *
	 * @return string
	 */
	public abstract function getType();
}
