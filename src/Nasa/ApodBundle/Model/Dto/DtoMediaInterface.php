<?php

namespace App\Nasa\ApodBundle\Model\Dto;

use DateTime;

interface DtoMediaInterface
{
    /**
     * @return string
     */
    public function getCopyright(): string;

    /**
     * @param string $copyright
     */
    public function setCopyright(string $copyright): void;

    /**
     * @return DateTime
     */
    public function getDate(): DateTime;

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date): void;

    /**
     * @return string
     */
    public function getExplanation(): string;

    /**
     * @param string $explanation
     */
    public function setExplanation(string $explanation): void;

    /**
     * @return string
     */
    public function getHdurl(): string;

    /**
     * @param string $hdurl
     */
    public function setHdurl(string $hdurl): void;

    /**
     * @return string
     */
    public function getMediaType(): string;

    /**
     * @param string $media_type
     */
    public function setMediaType(string $media_type): void;

    /**
     * @return string
     */
    public function getServiceVersion(): string;

    /**
     * @param string $service_version
     */
    public function setServiceVersion(string $service_version): void;

    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @param string $title
     */
    public function setTitle(string $title): void;

    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @param string $url
     */
    public function setUrl(string $url): void;

    /**
     * @return string
     */
    public function getThumbnailUrl(): string;

    /**
     * @param string $thumbnail_url
     */
    public function setThumbnailUrl(string $thumbnail_url): void;
}