<?php


namespace App\Nasa\ApodBundle\Command;


use App\Nasa\ApodBundle\Services\ApodServiceInterface;
use DateTime;
use LogicException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use function var_dump;

class BuildCommand extends Command
{
    /**
     * @var ApodServiceInterface
     */
    protected ApodServiceInterface $apodService;

    /**
     * BuildCommand constructor.
     * @param ApodServiceInterface $apodService
     */
    public function __construct(ApodServiceInterface $apodService)
    {
        parent::__construct();

        $this->apodService = $apodService;
    }

    /**
     * Configures the current command.
     */
    protected function configure()
    {
        $this
            ->setName('nasa:apod:build')
            ->setDescription("Build specified day picture from NASA API (use today by default)")
            ->addOption('date', 'd', InputOption::VALUE_OPTIONAL, 'Date for picture (format: Y-m-d)', null)
        ;
    }

    /**
     * Executes the current command.
     *
     * This method is not abstract because you can use this class
     * as a concrete class. In this case, instead of defining the
     * execute() method, you set the code to execute by passing
     * a Closure to the setCode() method.
     *
     * @return int 0 if everything went fine, or an exit code
     *
     * @throws LogicException When this abstract method is not implemented
     *
     * @see setCode()
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $date = new DateTime();
        $dateString = $input->getOption('date');
        if (null !== $dateString) {
            $date = DateTime::createFromFormat('Y-m-d', $dateString);
        }

        // Fetch and save picture of the current day
        $media = $this->getApodService()->fetchAndSave($date);

        if (null !== $media) {
            $output->writeln("Media for " . $media->getDate()->format('Y-m-d') . ' found!');
        } else {
            $output->writeln("No media found for today");
        }

        return 0;
    }

    /**
     * @return ApodServiceInterface
     */
    public function getApodService(): ApodServiceInterface
    {
        return $this->apodService;
    }
}