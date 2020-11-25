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
declare(strict_types=1);

namespace Mageplaza\PromoBarGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\Resolver\Argument\SearchCriteria\Builder as SearchCriteriaBuilder;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Mageplaza\PromoBar\Api\PromoBarRepositoryInterface;
use Mageplaza\PromoBar\Helper\Data;

/**
 * Class PromoBar
 * @package Mageplaza\PromoBarGraphQl\Model\Resolver
 */
class PromoBar implements ResolverInterface
{
    /**
     * @var Data
     */
    protected $helperData;
    /**
     * @var SearchCriteriaBuilder
     */
    protected $searchCriteriaBuilder;
    /**
     * @var PromoBarRepositoryInterface
     */
    protected $promoBarRepository;

    /**
     * PromoBar constructor.
     *
     * @param Data $helperData
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param PromoBarRepositoryInterface $promoBarRepository
     */
    public function __construct(
        Data $helperData,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        PromoBarRepositoryInterface $promoBarRepository
    ) {
        $this->helperData            = $helperData;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->promoBarRepository    = $promoBarRepository;
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (!$this->helperData->isEnabled()) {
            throw new GraphQlNoSuchEntityException(__('The module is disabled'));
        }
        if ($args['currentPage'] < 1) {
            throw new GraphQlInputException(__('currentPage value must be greater than 0.'));
        }
        if ($args['pageSize'] < 1) {
            throw new GraphQlInputException(__('pageSize value must be greater than 0.'));
        }

        $searchCriteria = $this->searchCriteriaBuilder->build('promo_bar', $args);
        $searchCriteria->setCurrentPage($args['currentPage']);
        $searchCriteria->setPageSize($args['pageSize']);
        $searchResult = $this->promoBarRepository->getList($searchCriteria);
        foreach ($searchResult->getItems() as $item) {
            $item->setContent($this->helperData->getTemplateContent($item));
            $this->helperData->setAutoTime($item);
        }

        return [
            'total_count' => $searchResult->getTotalCount(),
            'items'       => $searchResult->getItems()
        ];
    }
}
