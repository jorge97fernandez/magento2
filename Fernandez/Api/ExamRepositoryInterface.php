<?php

namespace Hiberus\Fernandez\Api;

use Hiberus\Fernandez\Api\Data\ExamInterface;
use Hiberus\Fernandez\Api\Data\ExamSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Interface ExamRepositoryInterface
 * @package Hiberus\Fernandez\Api
 */
interface ExamRepositoryInterface
{
    /**
     * Save a Exam
     *
     * @param ExamInterface $exam
     * @return ExamInterface
     */
    public function save(Data\ExamInterface $exam);

    /**
     * Get Exam by an Id
     *
     * @param int $examId
     * @return ExamInterface
     */
    public function getById($examId);

    /**
     * Retrieve exams matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Hiberus\Fernandez\Api\Data\ExamSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete a Exam
     *
     * @param ExamInterface $exam
     * @return bool
     */
    public function delete(Data\ExamInterface $exam);

    /**
     * Delete a Exam by an Id
     *
     * @param int $examId
     * @return bool
     */
    public function deleteById($examId);
}
