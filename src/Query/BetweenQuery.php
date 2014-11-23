<?php

namespace WikidataQueryApi\Query;

use DataValues\TimeValue;
use Wikibase\DataModel\Entity\PropertyId;

/**
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class BetweenQuery extends AbstractQuery {

	/**
	 * @var PropertyId
	 */
	private $propertyId;

	/**
	 * @var TimeValue|null
	 */
	private $beginValue;

	/**
	 * @var TimeValue|null
	 */
	private $endValue;

	/**
	 * @param PropertyId $propertyId
	 * @param TimeValue|null $beginValue
	 * @param TimeValue|null $endValue
	 */
	public function __construct( PropertyId $propertyId, TimeValue $beginValue = null, TimeValue $endValue = null ) {
		$this->propertyId = $propertyId;
		$this->beginValue = $beginValue;
		$this->endValue = $endValue;
	}

	/**
	 * @return PropertyId
	 */
	public function getPropertyId() {
		return $this->propertyId;
	}

	/**
	 * @return TimeValue|null
	 */
	public function getBeginValue() {
		return $this->beginValue;
	}

	/**
	 * @return TimeValue|null
	 */
	public function getEndValue() {
		return $this->endValue;
	}

	/**
	 * @see AbstractQuery::getType
	 */
	public function getType() {
		return 'between';
	}
}
