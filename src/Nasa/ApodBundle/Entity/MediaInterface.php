<?php

namespace App\Nasa\ApodBundle\Entity;

use DateTime;

interface MediaInterface
{
    /**
     * @return int
     */
    public function getId(): int;

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
    public function getExplanation(): string;

    /**
     * @param string $explanation
     */
    public function setExplanation(string $explanation): void;

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
    public function getImage(): string;

    /**
     * @param string $image
     */
    public function setImage(string $image): void;

    /**
     * @return string
     */
    public function getMediaType(): string;

    /**
     * @param string $mediaType
     */
    public function setMediaType(string $mediaType): void;

    /**
    * @return string
    */
    public function getUrl(): string;

    /**
     * @param string $url
     */
    public function setUrl(string $url): void;
}