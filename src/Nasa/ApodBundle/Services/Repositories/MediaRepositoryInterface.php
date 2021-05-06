<?php

namespace App\Nasa\ApodBundle\Services\Repositories;

use App\Nasa\ApodBundle\Entity\MediaInterface;
use DateTime;

interface MediaRepositoryInterface
{
    /**
     * Get most recent media
     *
     * @return MediaInterface|null
     */
    public function getMostRecent(): ?MediaInterface;

    /**
     * Get most recent picture
     *
     * @return MediaInterface|null
     */
    public function getMostRecentImage(): ?MediaInterface;

    /**
     * Get media for specified date
     * If no date set, use today
     *
     * @param DateTime|null $date
     *
     * @return MediaInterface|null
     */
    public function getFirstByDate(DateTime $date = null): ?MediaInterface;
}