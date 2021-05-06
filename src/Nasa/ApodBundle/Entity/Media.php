<?php


namespace App\Nasa\ApodBundle\Entity;

use App\Nasa\ApodBundle\Services\Repositories\MediaRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Media
 *
 * @package App\Nasa\ApodBundle\Entity
 *
 * @ORM\Entity(repositoryClass=MediaRepository::class)
 * @ORM\Table(indexes={@ORM\Index(name="media_type_idx", columns={"media_type"})})
 */
class Media implements MediaInterface
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected int $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected string $title;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    protected string $explanation;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="date")
     */
    protected DateTime $date;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected string $image;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected string $url;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected string $mediaType;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getMediaType(): string
    {
        return $this->mediaType;
    }

    /**
     * @param string $mediaType
     */
    public function setMediaType(string $mediaType): void
    {
        $this->mediaType = $mediaType;
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
}