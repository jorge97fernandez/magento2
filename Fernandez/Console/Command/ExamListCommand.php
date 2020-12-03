<?php
namespace Hiberus\Fernandez\Console\Command;

use Hiberus\Fernandez\Api\Data\ExamInterface;
use Hiberus\Fernandez\Api\ExamRepositoryInterface;
use Hiberus\Fernandez\Console\Command\Input\ExamList\ListInputValidator;
use Hiberus\Fernandez\Console\Command\Options\ExamList\ListOptions;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Console\Cli;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

/**
 * Class ExamListCommand
 * @package Hiberus\Fernandez\Console\Command
 */
class ExamListCommand extends Command
{
    const   DETAIL_TAG  =   'detail';

    /**
     * @var ListInputValidator
     */
    protected $validator;

    /**
     * @var ListOptions
     */
    protected $listOptions;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var ExamRepositoryInterface
     */
    private $examRepository;

    /**
     * ShowStudentsCommand constructor.
     * @param ListInputValidator $validator
     * @param ListOptions $listOptions
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param ExamRepositoryInterface $examRepository
     * @param string|null $name
     */
    public function __construct(
        ListInputValidator $validator,
        ListOptions $listOptions,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        ExamRepositoryInterface $examRepository,
        string $name = null
    ) {
        $this->validator = $validator;
        $this->listOptions = $listOptions;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->examRepository = $examRepository;

        parent::__construct($name);
    }

    /**
     * Configure
     */
    protected function configure()
    {
        $this->setName('hiberus:fernandez')
            ->setDescription('Show Exam List')
            ->setDefinition($this->listOptions->getOptionsList());

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws LocalizedException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->initFormatter($output);

        $this->process($input, $output);

        return Cli::RETURN_SUCCESS;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    private function process(InputInterface $input, OutputInterface $output)
    {

        /** @var ExamInterface $exam */
        foreach ($this->getExamList() as $exam) {
            $output->writeln(
                sprintf(
                    "<%s> >> FirstName: %s - LastName: %s - Mark: %s <%s>",
                    self::DETAIL_TAG,
                    $exam->getFirstName(),
                    $exam->getLastName(),
                    $exam->getMark(),
                    self::DETAIL_TAG
                )
            );
        }

    }

    /**
     * @return ExamInterface[]
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    private function getExamList()
    {
        $searchCriteria = $this->searchCriteriaBuilder->create();

        $examResults = $this->examRepository->getList($searchCriteria)->getItems();

        if (empty($examResults)) {
            throw new NoSuchEntityException(
                __('No exam found.')
            );
        }

        return $examResults;
    }

    /**
     * @param OutputInterface $output
     */
    private function initFormatter(OutputInterface $output)
    {
        /** @var OutputFormatterInterface $outputFormatter */
        $outputFormatter = $output->getFormatter();
        $outputFormatter->setStyle(self::DETAIL_TAG, new OutputFormatterStyle('yellow'));
    }
}
