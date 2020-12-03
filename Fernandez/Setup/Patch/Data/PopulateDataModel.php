<?php

namespace Hiberus\Fernandez\Setup\Patch\Data;

use Hiberus\Fernandez\Api\Data\ExamInterface;
use Hiberus\Fernandez\Api\Data\ExamInterfaceFactory;
use Hiberus\Fernandez\Api\ExamRepositoryInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\HTTP\Client\CurlFactory;

/**
 * Class PopulateDataModel
 * @package Hiberus\Fernandez\Setup\Patch\Data
 */
class PopulateDataModel implements DataPatchInterface
{
    const   RANDOM_PERSON_DATA_API_ENDPOINT =   'https://api.namefake.com/{{locale}}/{{gender}}/';
    const   NUMBER_OF_EXAMS  =   5;

    /**
     * @var ExamRepositoryInterface
     */
    private $examRepository;

    /**
     * @var ExamInterfaceFactory
     */
    private $examFactory;

    /**
     * @var CurlFactory
     */
    private $curlFactory;

    /**
     * PopulateDataModel constructor.
     * @param ExamRepositoryInterface $examRepository
     * @param ExamInterfaceFactory $examFactory
     * @param CurlFactory $curlFactory
     */
    public function __construct(
        ExamRepositoryInterface $examRepository,
        ExamInterfaceFactory $examFactory,
        CurlFactory $curlFactory
    ) {
        $this->examRepository = $examRepository;
        $this->examFactory = $examFactory;
        $this->curlFactory = $curlFactory;
    }

    /**
     * @return DataPatchInterface|void
     */
    public function apply()
    {
        $this->populateData();
    }

    /**
     * Populate Data Model
     */
    private function populateData()
    {
        $this->populateStudents();
    }

    /**
     * Populate Exams Data
     */
    private function populateStudents()
    {
        $examArray=[["firstname"=>"Javier","lastname"=>"Perez","mark"=>4.23],
            ["firstname"=>"Antonio","lastname"=>"Martinez","mark"=>7.18],
            ["firstname"=>"Paula","lastname"=>"Sanjuan","mark"=>6.54],
            ["firstname"=>"Angela","lastname"=>"Hernandez","mark"=>1.02],
            ["firstname"=>"Irene","lastname"=>"Garcia","mark"=>3.22]];
        for ($i = 0; $i < self::NUMBER_OF_EXAMS; $i++) {
            $examData = $examArray[$i];

            /** @var ExamInterface $exam */
            $exam = $this->examFactory->create();

            $exam->setFirstName($examData['firstname'])
                ->setLastName($examData['lastname'])
                ->setMark($examData['mark'])
            ;

            $this->examRepository->save(
                $exam
            );
        }
    }


    /**
     * @return string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @return string[]
     */
    public function getAliases()
    {
        return [];
    }
}
