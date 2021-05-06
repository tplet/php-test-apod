<?php


namespace App\Nasa\ApodBundle\Services;


use App\Nasa\ApodBundle\Entity\Media;
use App\Nasa\ApodBundle\Entity\MediaInterface;
use App\Nasa\ApodBundle\Factory\MediaFactoryInterface;
use App\Nasa\ApodBundle\Services\Repositories\MediaRepositoryInterface;
use DateTime;
use Doctrine\ORM\EntityManager;

class ApodService implements ApodServiceInterface
{
    /**
     * @var ApodApiServiceInterface
     */
    protected ApodApiServiceInterface $apodApiService;

    /**
     * @var MediaFactoryInterface
     */
    protected MediaFactoryInterface $mediaFactory;

    /**
     * @var EntityManager
     */
    protected EntityManager $entityManager;

    /**
     * ApodService constructor.
     * @param ApodApiServiceInterface $apodApiService
     * @param MediaFactoryInterface $mediaFactory
     * @param EntityManager $entityManager
     */
    public function __construct(
        ApodApiServiceInterface $apodApiService,
        MediaFactoryInterface $mediaFactory,
        EntityManager $entityManager
    ) {
        $this->apodApiService = $apodApiService;
        $this->mediaFactory = $mediaFactory;
        $this->entityManager = $entityManager;
    }

    /**
     * Fetch media for specified day if needed only
     * In case of API call needed, save media to prevent future API call
     *
     * If no day specified, set as today
     *
     * @param DateTime|null $date
     * @return MediaInterface|null
     */
    public function fetchAndSave(DateTime $date = null): ?MediaInterface
    {
        if (null === $date) {
            $date = new DateTime();
        }

        $entityManager = $this->getEntityManager();
        $repository = $this->getMediaRepository();

        // Test if picture already exists for $date
        $picture = $repository->getFirstByDate($date);
        // If not, get it
        if (null === $picture) {
            $apodApiService = $this->getApodApiService();
            $pictureFactory = $this->getPictureFactory();

            $dtoPicture = $apodApiService->requestApod();
            if (null !== $dtoPicture) {
                $picture = $pictureFactory->createFromDto($dtoPicture);

                // Save picture
                $entityManager->persist($picture);
                $entityManager->flush();
            }
        }

        return $picture;
    }

    /**
     * Get most recent picture
     *
     * @return MediaInterface|null
     */
    public function getMostRecentPicture(): ?MediaInterface
    {
        $repository = $this->getMediaRepository();

        return $repository->getMostRecentImage();
    }

    /**
     * @return MediaRepositoryInterface
     */
    protected function getMediaRepository(): MediaRepositoryInterface
    {
        $entityManager = $this->getEntityManager();
        return $entityManager->getRepository(Media::class); // Use interface instead (with resolve target entity)
    }

    /**
     * @return string[]
     */
    protected function getAllowedMediaType(): array
    {
        return ['image'];
    }

    /**
     * @return ApodApiServiceInterface
     */
    public function getApodApiService(): ApodApiServiceInterface
    {
        return $this->apodApiService;
    }

    /**
     * @return MediaFactoryInterface
     */
    public function getPictureFactory(): MediaFactoryInterface
    {
        return $this->mediaFactory;
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }
}