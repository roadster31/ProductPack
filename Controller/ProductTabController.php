<?php
/*************************************************************************************/
/*                                                                                   */
/*      Copyright (c) Franck Allimant, CQFDev                                        */
/*      email : thelia@cqfdev.fr                                                     */
/*      web : http://www.cqfdev.fr                                                   */
/*                                                                                   */
/*************************************************************************************/

namespace ProductPack\Controller;

use ProductPack\Form\ProductPackItemForm;
use ProductPack\Model\ProductPack;
use ProductPack\Model\ProductPackQuery;
use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Log\Tlog;
use Thelia\Model\ProductPriceQuery;
use Thelia\Model\ProductQuery;

/**
 * Class ViewController
 * @package View\Controller
 */
class ProductTabController extends BaseAdminController
{
    public function showItems($productId)
    {
        return $this->render(
            'product-pack/product-tab',
            [
                'product_id' => $productId
            ]
        );
    }

    public function addPackItem($productId)
    {
        return $this->addOrUpdatePackItem($productId, null);
    }

    public function updatePackItem($productId, $itemId)
    {
        return $this->addOrUpdatePackItem($productId, $itemId);
    }

    public function addOrUpdatePackItem($productId, $itemId)
    {
        $errorMessage = false;

        $form = new ProductPackItemForm($this->getRequest());

        try {
            $viewForm = $this->validateForm($form);

            $data = $viewForm->getData();

            if (null !== $itemId) {
                if (null === $productPack = ProductPackQuery::create()->findPk($itemId)) {
                    throw new \InvalidArgumentException("Undefined pack item ID $itemId");
                }
            } else {
                $productPack = new ProductPack();
            }

            $productPack
                ->setHostProductId($productId)
                ->setProductId($data['product_id'])
                ->setQuantity($data['position'])
                ->setQuantity($data['quantity'])
                ->setPrice($data['price'])
                ->save();

            // Update product price
            $total = ProductPackQuery::create()
                ->filterByHostProductId($productId)
                ->withColumn('SUM(PRICE * QUANTITY)', 'TOTAL_PRICE')
                ->findOne();

            $hostProductPrice = $total->getVirtualColumn('TOTAL_PRICE');

            $hostDefaultPse = ProductQuery::create()->findPk($productId)->getDefaultSaleElements();

            $currency = $this->getRequest()->getSession()->getCurrency();

            $productPrice = ProductPriceQuery::create()
                ->filterByCurrencyId($currency->getId())
                ->filterByProductSaleElementsId($hostDefaultPse->getId())
                ->findOne();

            $productPrice
                ->setPrice($hostProductPrice)
                ->setPromoPrice($hostProductPrice)
                ->save()
                ;
        } catch (\Exception $ex) {
            $errorMessage = $ex->getMessage();

            Tlog::getInstance()->error("Failed to validate product pack form: $errorMessage");
        }

        if (false !== $errorMessage) {
            $this->setupFormErrorContext(
                'Failed to process product pack tab form data',
                $errorMessage,
                $form
            );
        }

        return $this->renderAjaxResult($productId);
    }

    public function deletePackItem($productId, $itemId)
    {
        if (null !== $packItem = ProductPackQuery::create()->findPk($itemId)) {
            $packItem->delete();
        }
    
        return $this->renderAjaxResult($productId);
    }
    
    private function renderAjaxResult($productId)
    {
        return $this->render(
            'product-pack/ajax/product-pack-items',
            [ 'product_id' =>  $productId ]
        );
    }
}
