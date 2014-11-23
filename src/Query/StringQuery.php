<?php

namespace WikidataQueryApi\Query;

use DataValues\StringValue;
use Wikibase\DataModel\Entity\PropertyId;

/**
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class StringQuery extends AbstractQuery {

	/**
	 * @var PropertyId
	 */
	private $propertyId;

	/**
	 * @var StringValue
	 */
	private $stringValue;

	/**
	 * @param PropertyId $propertyId
	 * @param StringValue $stringValue
	 */
	public function __construct( PropertyId $propertyId, StringValue $stringValue ) {
		$this->propertyId = $propertyId;
		$this->stringValue = $stringValue;
	}

	/**
	 * @return PropertyId
	 */
	public function getPropertyId() {
		return $this->propertyId;
	}

	/**
	 * @return StringValue
	 */
	public function getStringValue() {
		return $this->stringValue;
	}

	/**
	 * @see AbstractQuery::getType
	 */
	public function getType() {
		return 'string';
	}
}
