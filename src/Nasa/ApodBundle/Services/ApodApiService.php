<?php


namespace App\Nasa\ApodBundle\Services;


use App\Nasa\ApodBundle\Factory\DtoFactoryInterface;
use App\Nasa\ApodBundle\Model\Dto\DtoMediaInterface;
use DateTime;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientExceptionInterface;

class ApodApiService extends Client implements ApodApiServiceInterface
{
    /**
     * @var string
     */
    protected string $url;

    /**
     * @var string
     */
    protected string $api_key;

    /**
     * @var DtoFactoryInterface
     */
    protected DtoFactoryInterface $mediaDtoFactory;

    /**
     * ApodApiService constructor.
     * @param string $url
     * @param string $api_key
     * @param DtoFactoryInterface $apodDtoFactory
     */
    public function __construct(string $url, string $api_key, DtoFactoryInterface $apodDtoFactory)
    {
        parent::__construct();

        $this->url = $url;
        $this->api_key = $api_key;
        $this->mediaDtoFactory = $apodDtoFactory;
    }

    /**
     * Request apod
     *
     * @param DateTime|null $date
     * @return DtoMediaInterface|null
     * @throws ClientExceptionInterface
     * @throws GuzzleException
     */
    public function requestApod(DateTime $date = null): ?DtoMediaInterface
    {
        $args = [
            'api_key' => $this->getApiKey(),
            'thumbs' => true,
        ];
        if (null !== $date) {
            $args['date'] = $date->format('Y-m-d');
        }

        $request = new Request('GET', $this->getUrl() . '?' . http_build_query($args));

        try {
            $response = $this->send($request, [
                'verify' => false,
            ]);

            return $this->getMediaDtoFactory()->create(json_decode($response->getBody()->getContents(), true));

        } catch (GuzzleException $e) {
            // TODO: Log exception. For now, trigger exception again.
            throw $e;
        } catch (ClientExceptionInterface $e) {
            // TODO: Log exception. For now, trigger exception again.
            throw $e;
        }
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->api_key;
    }

    /**
     * @return DtoFactoryInterface
     */
    public function getMediaDtoFactory(): DtoFactoryInterface
    {
        return $this->mediaDtoFactory;
    }
}