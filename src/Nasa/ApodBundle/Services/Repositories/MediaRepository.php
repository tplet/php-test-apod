<?php


namespace App\Nasa\ApodBundle\Services\Repositories;


use App\Nasa\ApodBundle\Entity\MediaInterface;
use App\Nasa\ApodBundle\Factory\MediaFactory;
use DateTime;
use Doctrine\ORM\EntityRepository;

class MediaRepository extends EntityRepository implements MediaRepositoryInterface
{
    /**
     * Get most recent media
     *
     * @return MediaInterface|null
     */
    public function getMostRecent(): ?MediaInterface
    {
        return $this->findOneBy([], ['date' => 'DESC']);
    }

    /**
     * Get most recent picture
     *
     * @return MediaInterface|null
     */
    public function getMostRecentImage(): ?MediaInterface
    {
        return $this->findOneBy([
            'mediaType' => MediaFactory::MEDIA_TYPE_IMAGE,
        ], ['date' => 'DESC']);

    }

    /**
     * Get media for specified date
     * If no date set, use today
     *
     * @param DateTime|null $date
     *
     * @return MediaInterface|null
     */
    public function getFirstByDate(DateTime $date = null): ?MediaInterface
    {
        if (null === $date) {
            $date = new DateTime();
        }

        return $this->findOneBy([
            'date' => $date,
        ], ['id' => 'DESC']);
    }

}