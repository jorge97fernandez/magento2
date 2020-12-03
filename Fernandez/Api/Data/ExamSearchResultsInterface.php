<?php

namespace Hiberus\Fernandez\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface ExamSearchResultsInterface
 * @package Hiberus\Fernandez\Api\Data
 */
interface ExamSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get exam list.
     *
     * @return \Hiberus\Fernandez\Api\Data\ExamInterface[]
     */
    public function getItems();

    /**
     * Set exam list.
     *
     * @param \Hiberus\Fernandez\Api\Data\ExamInterface[] $items
     * @return \Hiberus\Fernandez\Api\Data\ExamSearchResultsInterface
     */
    public function setItems(array $items);
}
