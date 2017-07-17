<?php
/*************************************************************************************/
/*      Copyright (c) Franck Allimant, CQFDev                                        */
/*      email : thelia@cqfdev.fr                                                     */
/*      web : http://www.cqfdev.fr                                                   */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE      */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

/**
 * Created by Franck Allimant, CQFDev <franck@cqfdev.fr>
 * Date: 10/07/2016 16:49
 */

namespace ProductPack\Loop;

use ProductPack\Model\ProductPack;
use ProductPack\Model\ProductPackQuery;
use Thelia\Core\Template\Element\BaseLoop;
use Thelia\Core\Template\Element\LoopResult;
use Thelia\Core\Template\Element\LoopResultRow;
use Thelia\Core\Template\Element\PropelSearchLoopInterface;
use Thelia\Core\Template\Loop\Argument\Argument;
use Thelia\Core\Template\Loop\Argument\ArgumentCollection;

class ProductPackItem extends BaseLoop implements PropelSearchLoopInterface
{
    public function buildModelCriteria()
    {

        $search = ProductPackQuery::create();

        if (null !== $hostProductId = $this->getHostProductId()) {
            $search
                ->filterByHostProductId($hostProductId)
                ->orderByPosition();
        }

        if (null !== $productId = $this->getProductId()) {
            $search
                ->filterByProductId($productId)
                ->groupByHostProductId()
                ;
        }

        return $search;
    }
    
    public function parseResults(LoopResult $loopResult)
    {
        /** @var ProductPack $item */
        foreach ($loopResult->getResultDataCollection() as $item) {
            $loopResultRow = new LoopResultRow($item);

            $loopResultRow
                ->set('ID', $item->getId())
                ->set('HOST_PRODUCT_ID', $item->getHostProductId())
                ->set('PRODUCT_ID', $item->getProductId())
                ->set('QUANTITY', $item->getQuantity())
                ->set('PRICE', $item->getPrice())
                ->set('POSITION', $item->getPosition())
            ;
            
            $loopResult->addRow($loopResultRow);
        }
        
        return $loopResult;
    }
    
    protected function getArgDefinitions()
    {
        return new ArgumentCollection(
            Argument::createIntListTypeArgument("host_product_id"),
            Argument::createIntListTypeArgument("product_id")
        );
    }
}