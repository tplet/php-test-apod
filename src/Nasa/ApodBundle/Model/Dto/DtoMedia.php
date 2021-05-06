<?php


namespace App\Nasa\ApodBundle\Model\Dto;


use DateTime;

class DtoMedia implements DtoMediaInterface
{
    /**
     * @var string
     */
    protected string $copyright;

    /**
     * @var DateTime
     */
    protected DateTime $date;

    /**
     * @var string
     */
    protected string $explanation;

    /**
     * @var string
     */
    protected string $hdurl;

    /**
     * @var string
     */
    protected string $media_type;

    /**
     * @var string
     */
    protected string $service_version;

    /**
     * @var string
     */
    protected string $title;

    /**
     * @var string
     */
    protected string $url;

    /**
     * @var string
     */
    protected string $thumbnail_url;

    /**
     * @return string
     */
    public function getCopyright(): string
    {
        return $this->copyright;
    }

    /**
     * @param string $copyright
     */
    public function setCopyright(string $copyright): void
    {
        $this->copyright = $copyright;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getExplanation(): string
    {
        return $this->explanation;
    }

    /**
     * @param string $explanation
     */
    public function setExplanation(string $explanation): void
    {
        $this->explanation = $explanation;
    }

    /**
     * @return string
     */
    public function getHdurl(): string
    {
        return $this->hdurl;
    }

    /**
     * @param string $hdurl
     */
    public function setHdurl(string $hdurl): void
    {
        $this->hdurl = $hdurl;
    }

    /**
     * @return string
     */
    public function getMediaType(): string
    {
        return $this->media_type;
    }

    /**
     * @param string $media_type
     */
    public function setMediaType(string $media_type): void
    {
        $this->media_type = $media_type;
    }

    /**
     * @return string
     */
    public function getServiceVersion(): string
    {
        return $this->service_version;
    }

    /**
     * @param string $service_version
     */
    public function setServiceVersion(string $service_version): void
    {
        $this->service_version = $service_version;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getThumbnailUrl(): string
    {
        return $this->thumbnail_url;
    }

    /**
     * @param string $thumbnail_url
     */
    public function setThumbnailUrl(string $thumbnail_url): void
    {
        $this->thumbnail_url = $thumbnail_url;
    }
}