<?php

namespace WikidataQueryApi\DataModel;

/**
 * Base class for all queries.
 *
 * @licence MIT
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
