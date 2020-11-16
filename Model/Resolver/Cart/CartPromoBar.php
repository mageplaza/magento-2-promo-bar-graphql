<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_PromoBarGraphQl
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\PromoBarGraphQl\Model\Resolver\Cart;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Mageplaza\PromoBar\Helper\Data;
use Mageplaza\PromoBar\Model\Template;

/**
 * Class CartPromoBar
 * @package Mageplaza\PromoBarGraphQl\Model\Resolver\Cart
 */
class CartPromoBar implements ResolverInterface
{

    /**
     * @var Data
     */
    protected $helperData;

    /**
     * CartPromoBar constructor.
     *
     * @param Data $helperData
     */
    public function __construct(Data $helperData)
    {
        $this->helperData = $helperData;
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (!isset($value['model'])) {
            throw new LocalizedException(__('"model" value should be specified'));
        }
        if (!$this->helperData->isEnabled()) {
            return [];
        }

        $cart      = $value['model'];
        $itemsData = [];
        if ($cart->getData('has_error')) {
            $errors = $cart->getErrors();
            foreach ($errors as $error) {
                $itemsData[] = new GraphQlInputException(__($error->getText()));
            }
        }

        $quote           = $cart->collectTotals();
        $address         = $quote->isVirtual() ? $quote->getBillingAddress() : $quote->getShippingAddress();
        $customerGroupId = $quote->getCustomerGroupId();
        $storeId         = (int) $context->getExtensionAttributes()->getStore()->getId();
        $collection      = $this->helperData->getPromoBarCollection($customerGroupId, $storeId);
        foreach ($collection as $item) {
            /** @var Template $item */
            if ($item->validate($address)) {
                $item->setContent($this->helperData->getTemplateContent($item));
                $this->helperData->setAutoTime($item);
                $itemsData[] = $item;
            }
        }

        return $itemsData;
    }
}
