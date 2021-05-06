<?php


namespace App\Tests;


use App\Nasa\ApodBundle\Factory\MediaDtoFactory;
use App\Nasa\ApodBundle\Factory\MediaFactory;
use DateTime;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    protected function generatePictureMediaDtoArgs(): array
    {
        return [
            "copyright" => "Mike Selby",
            "date" => "2021-05-06",
            "explanation" => "NGC 3199 lies about 12,000 light-years away, a glowing cosmic cloud in the nautical southern constellation of Carina. The nebula is about 75 light-years across in this narrowband, false-color view.  Though the deep image reveals a more or less complete bubble shape, it does look very lopsided with a much brighter edge along the top. Near the center is a Wolf-Rayet star, a massive, hot, short-lived star that generates an intense stellar wind. In fact, Wolf-Rayet stars are known to create nebulae with interesting shapes as their powerful winds sweep up surrounding interstellar material. In this case, the bright edge was thought to indicate a bow shock produced as the star plowed through a uniform medium, like a boat through water. But measurements have shown the star is not really moving directly toward the bright edge. So a more likely explanation is that the material surrounding the star is not uniform, but clumped and denser near the bright edge of windblown NGC 3199.",
            "hdurl" => "https://apod.nasa.gov/apod/image/2105/ColombariNGC3199.jpg",
            "media_type" => "image",
            "service_version" => "v1",
            "title" => "Windblown NGC 3199",
            "url" => "https://apod.nasa.gov/apod/image/2105/ColombariNGC3199_1024.jpg",
        ];
    }

    protected function generateVideoMediaDtoArgs(): array
    {
        return [
            "date" => "2021-02-23",
            "explanation" => "What would it look like to land on Mars?  To better monitor the instruments involved in the Entry, Decent, and Landing of the Perseverance Rover on Mars last week, cameras with video capability were included that have now returned their images. The featured 3.5-minute composite video begins with the opening of a huge parachute that dramatically slows the speeding spacecraft as it enters the Martian atmosphere.  Next the heat shield is seen separating and falls ahead. As Perseverance descends, Mars looms large and its surface becomes increasingly detailed.  At just past 2-minutes into the video, the parachute is released and Perseverance begins to land with dust-scattering rockets. Soon the Sky Crane takes over and puts Perseverance down softly, then quickly jetting away. The robotic Perseverance rover will now begin exploring ancient Jezero Crater, including a search for signs that life once existed on Earth's neighboring planet.",
            "media_type" => "video",
            "service_version" => "v1",
            "thumbnail_url" => "https://img.youtube.com/vi/4czjS9h4Fpg/0.jpg",
            "title" => "Video: Perseverance Landing on Mars",
            "url" => "https://www.youtube.com/embed/4czjS9h4Fpg?rel=0",
        ];
    }

    public function testMediaDto()
    {
        // Picture
        $this->mediaDto($this->generatePictureMediaDtoArgs());
        // Video
        $this->mediaDto($this->generateVideoMediaDtoArgs());
    }

    protected function mediaDto(array $args)
    {
        $factory = new MediaDtoFactory();
        $mediaDto = $factory->create($args);

        $this->assertInstanceOf(DateTime::class, $mediaDto->getDate());
        $this->assertEquals($args['date'], $mediaDto->getDate()->format('Y-m-d'));
        $this->assertEquals($args['explanation'], $mediaDto->getExplanation());
        if ($args['media_type'] === 'image') {
            $this->assertEquals($args['hdurl'], $mediaDto->getHdurl());
            $this->assertEquals($args['copyright'], $mediaDto->getCopyright());
        }
        $this->assertEquals($args['media_type'], $mediaDto->getMediaType());
        $this->assertEquals($args['service_version'], $mediaDto->getServiceVersion());
        $this->assertEquals($args['title'], $mediaDto->getTitle());
        $this->assertEquals($args['url'], $mediaDto->getUrl());
        if ($args['media_type'] === 'video') {
            $this->assertEquals($args['thumbnail_url'], $mediaDto->getThumbnailUrl());
        }
    }

    public function testMedia()
    {
        // Picture
        $this->media($this->generatePictureMediaDtoArgs());
        // Video
        $this->media($this->generateVideoMediaDtoArgs());
    }

    protected function media(array $args)
    {
        $factoryDto = new MediaDtoFactory();
        $mediaDto = $factoryDto->create($args);

        $factory = new MediaFactory();
        $media = $factory->createFromDto($mediaDto);

        $this->assertInstanceOf(DateTime::class, $media->getDate());
        $this->assertEquals($args['date'], $media->getDate()->format('Y-m-d'));
        $this->assertEquals($args['explanation'], $media->getExplanation());
        $this->assertEquals($args['media_type'], $media->getMediaType());
        $this->assertEquals($args['title'], $media->getTitle());
        $this->assertEquals($args['url'], $media->getUrl());

        if ($args['media_type'] === 'video') {
            $this->assertEquals($args['thumbnail_url'], $media->getImage());
        } else {
            $this->assertEquals($args['url'], $media->getImage());
        }
    }
}