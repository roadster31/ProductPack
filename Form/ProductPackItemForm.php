<?php
/*************************************************************************************/
/*                                                                                   */
/*      Copyright (c) Franck Allimant, CQFDev                                        */
/*      email : thelia@cqfdev.fr                                                     */
/*      web : http://www.cqfdev.fr                                                   */
/*                                                                                   */
/*************************************************************************************/

namespace ProductPack\Form;

use PrixEtPoints\PrixEtPoints;
use ProductPack\ProductPack;
use Propel\Runtime\ActiveQuery\Criteria;
use Thelia\Form\BaseForm;
use Thelia\Model\Category;
use Thelia\Model\CategoryQuery;
use Thelia\Model\Lang;

/**
 * @author Franck Allimant <franck@cqfdev.fr>
 */
class ProductPackItemForm extends BaseForm
{
    protected function buildForm()
    {
        $this->formBuilder
            ->add(
                'category_id',
                'choice',
                [
                    'required' => false,
                    'choices' => $this->getRubriquesChoices(),
                    'label' => $this->translator->trans('Rubrique', [], ProductPack::DOMAIN_NAME)
                ]
            )
            ->add(
                'product_id',
                'integer',
                [
                    'required' => true,
                    'label' => $this->translator->trans('Produit', [], ProductPack::DOMAIN_NAME),
                ]
            )
            ->add(
                'position',
                'integer',
                [
                    'required' => true,
                    'label' => $this->translator->trans('Position du produit dans le lot', [], ProductPack::DOMAIN_NAME),
                ]
            )->add(
                'quantity',
                'integer',
                [
                    'required' => true,
                    'label' => $this->translator->trans('Quantité', [], ProductPack::DOMAIN_NAME),
                    'label_attr' => [
                        'help' => $this->translator->trans('Quantité de ce produit dans ce lot.', [], ProductPack::DOMAIN_NAME)
                    ]
                
                ]
            )->add(
                'price',
                'number',
                [
                    'required' => true,
                    'label' => $this->translator->trans('Prix unitaire', [], ProductPack::DOMAIN_NAME),
                    'label_attr' => [
                        'help' => $this->translator->trans('Le prix unitaire du produit dans ce lot.', [], ProductPack::DOMAIN_NAME)
                    ]
                
                ]
            )
        ;
    }

    private static $categorySelect;

    private function getRubriquesChoices()
    {
        if (null === self::$categorySelect) {
            self::$categorySelect = [];

            self::$categorySelect[''] = "Choisissez une rubrique...";

            self::getCategoryTreeIds(0, 0, Lang::getDefaultLanguage()->getLocale(), [], self::$categorySelect);
        }

        return self::$categorySelect;
    }
    /**
     * @param Category $category
     * @param int $depth
     *
     * @return array
     */
    private function getCategoryTreeIds($categoryId, $depth, $locale, array $excludeIds, &$select)
    {
        $result = is_array($categoryId) ? $categoryId : [ $categoryId ];

        $categories = CategoryQuery::create()
            ->filterByParent($categoryId, Criteria::IN)
            ->find();

        /** @var Category $category */
        foreach ($categories as $category) {
            $select[ $category->getId() ] = str_repeat("&nbsp;", 4 * $depth) . $category->setLocale($locale)->getTitle();

            $result = array_merge(
                $result,
                self::getCategoryTreeIds($category->getId(), 1 + $depth, $locale, $excludeIds, $select)
            );
        }

        return $result;
    }
}
