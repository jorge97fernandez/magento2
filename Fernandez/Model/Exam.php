<?php

namespace Hiberus\Fernandez\Model;

use Hiberus\Fernandez\Api\Data\ExamInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Exam
 * @package Hiberus\Fernandez\Model
 */
class Exam extends AbstractModel implements ExamInterface
{

    protected function _construct()
    {
        $this->_init(\Hiberus\Fernandez\Model\ResourceModel\Exam::class);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_getData(self::ID);
    }

    /**
     * Set Exam ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->_getData(self::FIRSTNAME);
    }

    /**
     * Set Exam FirstName
     *
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName)
    {
        return $this->setData(self::FIRSTNAME, $firstName);
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->_getData(self::LASTNAME);
    }

    /**
     * Set Exam LastName
     *
     * @param string $lastName
     * @return $this
     */
    public function setLastName($lastName)
    {
        return $this->setData(self::LASTNAME, $lastName);
    }

    /**
     * @return string
     */
    public function getMark()
    {
        return $this->_getData(self::MARK);
    }

    /**
     * @param mixed[]|null $mark
     * @return $this
     */
    public function setMark($mark)
    {
        return $this->setData(self::MARK, $mark);
    }
}
