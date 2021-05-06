<?php

namespace App\Nasa\ApodBundle\Factory;

use App\Nasa\ApodBundle\Entity\MediaInterface;
use App\Nasa\ApodBundle\Model\Dto\DtoMediaInterface;

interface MediaFactoryInterface
{
    /**
     * @param DtoMediaInterface $dtoPicture
     * @return MediaInterface
     */
    public function createFromDto(DtoMediaInterface $dtoPicture): MediaInterface;
}