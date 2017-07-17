<?php

namespace ProductPack\Model;

use ProductPack\Model\Base\ProductPack as BaseProductPack;
use Propel\Runtime\Connection\ConnectionInterface;
use Thelia\Model\Tools\PositionManagementTrait;

class ProductPack extends BaseProductPack
{
    use PositionManagementTrait;

    /**
     * Calculate next position relative to our parent
     *
     * @param ProductPackQuery $query
     */
    protected function addCriteriaToPositionQuery($query)
    {
        $query->filterByHostProductId($this->getHostProductId());
    }

    /**
     * {@inheritDoc}
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        $this->setPosition($this->getNextPosition());

        return true;
    }
}
