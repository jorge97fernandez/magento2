<?php

namespace Hiberus\Fernandez\Model\ResourceModel\Exam;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Hiberus\Fernandez\Model;

/**
 * Class Collection
 * @package Hiberus\Fernandez\Model\ResourceModel\Student
 */
class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model\Exam::class, Model\ResourceModel\Exam::class);
    }
}
