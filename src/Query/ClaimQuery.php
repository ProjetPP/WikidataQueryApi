<?php

namespace WikidataQueryApi\Query;

use Wikibase\DataModel\Entity\ItemId;
use Wikibase\DataModel\Entity\PropertyId;

/**
 * @licence GPLv2+
 * @author Thomas Pellissier Tanon
 */
class ClaimQuery extends AbstractQuery {

	/**
	 * @var PropertyId
	 */
	private $propertyId;

	/**
	 * @var ItemId|null
	 */
	private $itemId;

	/**
	 * @param PropertyId $propertyId
	 * @param ItemId|null $itemId
	 */
	public function __construct( PropertyId $propertyId, ItemId $itemId = null ) {
		$this->propertyId = $propertyId;
		$this->itemId = $itemId;
	}

	/**
	 * @return PropertyId
	 */
	public function getPropertyId() {
		return $this->propertyId;
	}

	/**
	 * @return ItemId|null
	 */
	public function getItemId() {
		return $this->itemId;
	}

	/**
	 * @see AbstractQuery::getType
	 */
	public function getType() {
		return 'claim';
	}
}
