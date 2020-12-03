<?php

namespace Hiberus\Fernandez\Api\Data;

/**
 * Interface ExamInterface
 * @package Hiberus\Fernandez\Api\Data
 */
interface ExamInterface
{
    const ID = 'id_exam';
    const FIRSTNAME = 'firstname';
    const LASTNAME = 'lastname';
    const MARK = 'mark';

    /**
     * Get Exam ID
     *
     * @return int
     */
    public function getId();

    /**
     * Set Exam ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get Exam FirstName
     *
     * @return string
     */
    public function getFirstName();

    /**
     * Set Exam FirstName
     *
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName);

    /**
     * Get Exam LastName
     *
     * @return string
     */
    public function getLastName();

    /**
     * Set Exam LastName
     *
     * @param string $lastName
     * @return $this
     */
    public function setLastName($lastName);

    /**
     * Get Exam Mark
     *
     * @return double
     */
    public function getMark();

    /**
     * @param mixed[]|null $mark
     * @return $this
     */
    public function setMark($mark);

}
