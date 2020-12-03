<?php

namespace Hiberus\Fernandez\Plugin;

use Hiberus\Fernandez\Api\Data\ExamInterface;
use Hiberus\Fernandez\Api\Data\ExamSearchResultsInterface;
use Hiberus\Fernandez\Api\ExamRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Hiberus\Fernandez\Block\Exams\ExamList;

/**
 * Class PluginNota
 * @package Hiberus\Fernandez\Plugin
 */
class PluginNota
{
    /**
     * @param ExamList $exam
     * @param string[] $result
     * @return string[]
     *
     */
    public function afterGetExamList(ExamList $exam,
        $result
    ) {
        foreach ($result as &$item){
            if($item["mark"]< 5.0){
                $item["mark"]=4.9;
            }
        }

        return $result;
    }
}
