<?php

namespace App\Nasa\ApodBundle\Services;

use App\Nasa\ApodBundle\Entity\MediaInterface;
use DateTime;

interface ApodServiceInterface
{
    /**
     * Fetch media for specified day if needed only
     * In case of API call needed, save media to prevent future API call
     *
     * If no day specified, set as today
     *
     * @param DateTime|null $date
     * @return MediaInterface|null
     */
    public function fetchAndSave(DateTime $date = null): ?MediaInterface;

    /**
     * Get most recent picture
     *
     * @return MediaInterface|null
     */
    public function getMostRecentPicture(): ?MediaInterface;
}