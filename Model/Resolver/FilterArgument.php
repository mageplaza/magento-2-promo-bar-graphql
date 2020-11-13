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

namespace Mageplaza\PromoBarGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\ConfigInterface;
use Magento\Framework\GraphQl\Query\Resolver\Argument\FieldEntityAttributesInterface;
use Mageplaza\PromoBar\Helper\Data;

/**
 * Class FilterArgument
 * @package Mageplaza\PromoBarGraphQl\Model\Resolver
 */
class FilterArgument implements FieldEntityAttributesInterface
{
    /**
     * @var ConfigInterface
     */
    protected $config;
    /**
     * @var Data
     */
    protected $helperData;

    /**
     * FilterArgument constructor.
     *
     * @param ConfigInterface $config
     * @param Data $helperData
     */
    public function __construct(
        ConfigInterface $config,
        Data $helperData
    ) {
        $this->config = $config;
        $this->helperData = $helperData;
    }

    /**
     * @return array
     */
    public function getEntityAttributes(): array
    {
        $fields = [];
        /** @var Field $field */
        foreach ($this->config->getConfigElement('PromoBar')->getFields() as $field) {
            $fields[$field->getName()] = 'String';
        }
        if ($this->helperData->versionCompare('2.3.4')) {
            return $fields;
        }

        return array_keys($fields);
    }
}
