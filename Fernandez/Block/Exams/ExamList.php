<?php

namespace Hiberus\Fernandez\Block\Exams;

use Psr\Log\LoggerInterface;

class ExamList extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Hiberus\Fernandez\Api\ExamRepositoryInterface $examRepository
     */
    private $examRepository;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteria
     */
    private $searchCriteria;

    /**
     * @var \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder
     */
    private $sortOrderBuilder;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(
        \Hiberus\Fernandez\Api\ExamRepositoryInterface $examRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder,
        \Magento\Framework\View\Element\Template\Context $context,
        LoggerInterface $logger,
        array $data = []
    ){
        $this->examRepository = $examRepository;
        $this->searchCriteria = $searchCriteriaBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
        $this->logger = $logger;
        parent::__construct($context, $data);
    }


    /**
     * Return exams
     * @return string[] Exam List
     */
    public function getExamList()
    {
        $exams = [];

        // Get product list
        $examList = $this->examRepository->getList($this->searchCriteria
            ->addSortOrder($this->sortOrderBuilder->setField('mark')->setDirection('desc')->create())
            ->create())->getItems();
        $x=0;

        foreach ($examList as $exam){
            $exams[] = ["firstname"=>$exam->getFirstName(),"lastname"=>$exam->getLastName(),
                "mark"=>$exam->getMark(),"top3" => $x<3? "Y":"N"];
            $x++;
        }

        return $exams;
    }

    public function getExamCount(){
        $examList = $this->examRepository->getList($this->searchCriteria
            ->create())->getTotalCount();

        return $examList;
    }

    public function getMediaNotas(){
        $numeroExamenes = $this->getExamCount();
        $examenes = $this->getExamList();
        $sumaExamenes= 0.0;
        foreach ($examenes as $exam){
            $sumaExamenes= $sumaExamenes + $exam["mark"];
        }
        $this->logger->info("La nota media es " . ($sumaExamenes/$numeroExamenes));
        $this->logger->info("El numero de alumnos es " . $numeroExamenes);
        return $sumaExamenes/$numeroExamenes;

    }
}
