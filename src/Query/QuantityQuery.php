<?php

namespace WikidataQueryApi\Query;

use DataValues\DecimalValue;
use Wikibase\DataModel\Entity\PropertyId;

/**
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class QuantityQuery extends AbstractQuery {

	/**
	 * @var PropertyId
	 */
	private $propertyId;

	/**
	 * @var DecimalValue
	 */
	private $lowerValue;

	/**
	 * @var DecimalValue|null
	 */
	private $upperValue;

	/**
	 * @param PropertyId $propertyId
	 * @param DecimalValue $lowerValue
	 * @param DecimalValue|null $upperValue
	 */
	public function __construct( PropertyId $propertyId, DecimalValue $lowerValue, DecimalValue $upperValue = null ) {
		$this->propertyId = $propertyId;
		$this->lowerValue = $lowerValue;
		$this->upperValue = $upperValue;
	}

	/**
	 * @return PropertyId
	 */
	public function getPropertyId() {
		return $this->propertyId;
	}

	/**
	 * @return DecimalValue
	 */
	public function getLowerValue() {
		return $this->lowerValue;
	}

	/**
	 * @return DecimalValue|null
	 */
	public function getUpperValue() {
		return $this->upperValue;
	}

	/**
	 * @see AbstractQuery::getType
	 */
	public function getType() {
		return 'quantity';
	}
}
