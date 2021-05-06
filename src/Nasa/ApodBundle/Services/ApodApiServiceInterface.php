<?php

namespace App\Nasa\ApodBundle\Services;

use App\Nasa\ApodBundle\Model\Dto\DtoMediaInterface;

interface ApodApiServiceInterface
{
    /**
     * Request apod
     *
     * @return DtoMediaInterface|null
     */
    public function requestApod(): ?DtoMediaInterface;
}