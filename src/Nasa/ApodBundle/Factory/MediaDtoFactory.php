<?php


namespace App\Nasa\ApodBundle\Factory;


use App\Nasa\ApodBundle\Model\Dto\DtoMedia;
use App\Nasa\ApodBundle\Model\Dto\DtoMediaInterface;
use DateTime;

class MediaDtoFactory implements DtoFactoryInterface
{
    /**
     * Create new DtoMedia from arguments
     *
     * @param array $args
     * @return DtoMediaInterface
     */
    public function create(array $args = []): DtoMediaInterface
    {
        $dtoMedia = new DtoMedia();

        if (isset($args['copyright'])) {
            $dtoMedia->setCopyright($args['copyright']);
        }
        if (isset($args['date']) && !empty($args['date'])) {
            $dtoMedia->setDate(DateTime::createFromFormat('Y-m-d', $args['date']));
        }
        if (isset($args['explanation'])) {
            $dtoMedia->setExplanation($args['explanation']);
        }
        if (isset($args['hdurl'])) {
            $dtoMedia->setHdurl($args['hdurl']);
        }
        if (isset($args['media_type'])) {
            $dtoMedia->setMediaType($args['media_type']);
        }
        if (isset($args['service_version'])) {
            $dtoMedia->setServiceVersion($args['service_version']);
        }
        if (isset($args['title'])) {
            $dtoMedia->setTitle($args['title']);
        }
        if (isset($args['url'])) {
            $dtoMedia->setUrl($args['url']);
        }
        if (isset($args['thumbnail_url'])) {
            $dtoMedia->setThumbnailUrl($args['thumbnail_url']);
        }

        return $dtoMedia;
    }
}