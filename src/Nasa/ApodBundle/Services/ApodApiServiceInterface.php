<?php

namespace App\Nasa\ApodBundle\Services;

use App\Nasa\ApodBundle\Model\Dto\DtoMediaInterface;
use DateTime;

interface ApodApiServiceInterface
{
    /**
     * Request apod
     *
     * @param DateTime|null $date
     * @return DtoMediaInterface|null
     */
    public function requestApod(DateTime $date = null): ?DtoMediaInterface;
}