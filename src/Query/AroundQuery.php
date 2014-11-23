<?php

namespace WikidataQueryApi\Query;

use DataValues\LatLongValue;
use Wikibase\DataModel\Entity\PropertyId;

/**
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class AroundQuery extends AbstractQuery {

	/**
	 * @var PropertyId
	 */
	private $propertyId;

	/**
	 * @var LatLongValue
	 */
	private $latLongValue;

	/**
	 * @var float
	 */
	private $radius;

	/**
	 * @param PropertyId $propertyId
	 * @param LatLongValue $latLongValue
	 * @param float $radius
	 */
	public function __construct( PropertyId $propertyId, LatLongValue $latLongValue, $radius ) {
		$this->propertyId = $propertyId;
		$this->latLongValue = $latLongValue;
		$this->radius = $radius;
	}

	/**
	 * @return PropertyId
	 */
	public function getPropertyId() {
		return $this->propertyId;
	}

	/**
	 * @return LatLongValue
	 */
	public function getLatLongValue() {
		return $this->latLongValue;
	}

	/**
	 * @return float
	 */
	public function getRadius() {
		return $this->radius;
	}

	/**
	 * @see AbstractQuery::getType
	 */
	public function getType() {
		return 'around';
	}
}
