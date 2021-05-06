<?php


namespace App\Controller;


use App\Nasa\ApodBundle\Services\ApodServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @var ApodServiceInterface
     */
    protected ApodServiceInterface $apodService;

    /**
     * HomeController constructor.
     * @param ApodServiceInterface $apodService
     */
    public function __construct(ApodServiceInterface $apodService)
    {
        $this->apodService = $apodService;
    }


    public function index(): Response
    {
        // Get most recent picture
        $picture = $this->apodService->getMostRecentPicture();

        return $this->render('home/index.html.twig', [
            'media' => $picture,
        ]);
    }

    /**
     * @return ApodServiceInterface
     */
    public function getApodService(): ApodServiceInterface
    {
        return $this->apodService;
    }
}