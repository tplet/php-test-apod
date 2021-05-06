<?php


namespace App\Nasa\ApodBundle\Factory;


use App\Nasa\ApodBundle\Entity\Media;
use App\Nasa\ApodBundle\Entity\MediaInterface;
use App\Nasa\ApodBundle\Model\Dto\DtoMediaInterface;

class MediaFactory implements MediaFactoryInterface
{
    const MEDIA_TYPE_VIDEO = 'video';
    const MEDIA_TYPE_IMAGE = 'image';

    /**
     * @param DtoMediaInterface $dtoPicture
     * @return MediaInterface
     */
    public function createFromDto(DtoMediaInterface $dtoPicture): MediaInterface
    {
        $picture = new Media();

        $picture->setTitle($dtoPicture->getTitle());
        $picture->setExplanation($dtoPicture->getExplanation());
        $picture->setDate($dtoPicture->getDate());
        $picture->setMediaType($dtoPicture->getMediaType());
        $picture->setUrl($dtoPicture->getUrl());

        // Store no-hd quality version, or thumbnail if video
        $picture->setImage($dtoPicture->getMediaType() === self::MEDIA_TYPE_VIDEO ?
            $dtoPicture->getThumbnailUrl() : $dtoPicture->getUrl());

        return $picture;
    }
}