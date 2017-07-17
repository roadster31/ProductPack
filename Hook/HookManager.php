<?php
/*************************************************************************************/
/*                                                                                   */
/*      Copyright (c) Franck Allimant, CQFDev                                        */
/*      email : thelia@cqfdev.fr                                                     */
/*      web : http://www.cqfdev.fr                                                   */
/*                                                                                   */
/*************************************************************************************/

/**
 * Created by Franck Allimant, CQFDev <franck@cqfdev.fr>
 * Date: 05/03/2016 18:11
 */

namespace ProductPack\Hook;

use ProductPack\ProductPack;
use Thelia\Core\Event\Hook\HookRenderBlockEvent;
use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;
use Thelia\Tools\URL;

class HookManager extends BaseHook
{
    public function onProductTab(HookRenderBlockEvent $event)
    {
        $event->add(
            [
                'id' => 'product_pack_tab',
                'title' => $this->trans('Lot', [], ProductPack::DOMAIN_NAME),
                'href' => URL::getInstance()->absoluteUrl('/admin/module/productpack/show/' . $event->getArgument('id')),
                'content' => "Contenu !"
            ]
        );
    }

    public function onProductEditJs(HookRenderEvent $event)
    {
        $productId = $event->getArgument('product_id');

        $event
            ->add(
                $this->addJS(
                    "product-pack/js/bootstrap-notify.min.js"
                )
            )->add(
                $this->render("product-pack/js/product-pack.js.html",
                    [
                        'product_id' => $productId
                    ])
            );
    }
}