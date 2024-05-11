<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Exception\InvalidSource;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\BeerCollectionResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\BeerResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\FermentationMethodCollectionResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\FermentationMethodResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\FoamCollectionResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\FoamResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\Enum\EndpointEnum;
use MalvikLab\BrewBuddyClient\Clients\V1\Makers\BeerCollectionResponseMaker;
use MalvikLab\BrewBuddyClient\Clients\V1\Makers\BeerResponseMaker;
use MalvikLab\BrewBuddyClient\Clients\V1\Makers\FermentationMethodCollectionMaker;
use MalvikLab\BrewBuddyClient\Clients\V1\Makers\FermentationMethodResponseMaker;
use MalvikLab\BrewBuddyClient\Clients\V1\Makers\FoamCollectionResponseMaker;
use MalvikLab\BrewBuddyClient\Clients\V1\Makers\FoamResponseMaker;
use MalvikLab\BrewBuddyClient\Interfaces\ClientInterface;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\BreweryCollectionResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\BreweryResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\CountryCollectionResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\CountryResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\GlassCollectionResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\GlassResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\ImageCollectionResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\ImageResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\LanguageCollectionResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\LanguageResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\TypologyCollectionResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\TypologyResponseDTO;
use MalvikLab\BrewBuddyClient\Clients\V1\Helpers\ClientHelper;
use MalvikLab\BrewBuddyClient\Clients\V1\Makers\BreweryCollectionResponseMaker;
use MalvikLab\BrewBuddyClient\Clients\V1\Makers\BreweryResponseMaker;
use MalvikLab\BrewBuddyClient\Clients\V1\Makers\CountryCollectionResponseMaker;
use MalvikLab\BrewBuddyClient\Clients\V1\Makers\CountryResponseMaker;
use MalvikLab\BrewBuddyClient\Clients\V1\Makers\GlassCollectionResponseMaker;
use MalvikLab\BrewBuddyClient\Clients\V1\Makers\GlassResponseMaker;
use MalvikLab\BrewBuddyClient\Clients\V1\Makers\ImageCollectionResponseMaker;
use MalvikLab\BrewBuddyClient\Clients\V1\Makers\ImageResponseMaker;
use MalvikLab\BrewBuddyClient\Clients\V1\Makers\LanguageCollectionResponseMaker;
use MalvikLab\BrewBuddyClient\Clients\V1\Makers\LanguageResponseMaker;
use MalvikLab\BrewBuddyClient\Clients\V1\Makers\TypologyCollectionResponseMaker;
use MalvikLab\BrewBuddyClient\Clients\V1\Makers\TypologyResponseMaker;
use MalvikLab\BrewBuddyClient\Clients\V1\Options\RequestOption;
use MalvikLab\BrewBuddyClient\Exceptions\InvalidArgumentException;
use MalvikLab\BrewBuddyClient\Interfaces\RequestOptionInterface;

class Client implements ClientInterface
{
    protected HttpClient $httpClient;
    protected string $baseUri;
    protected ClientHelper $clientHelper;

    public function __construct(?HttpClient $httpClient = null, string $baseUri = 'https://brewbuddy.dev')
    {
        if ( $httpClient )
        {
            $this->httpClient = $httpClient;
        } else {
            $this->httpClient = new HttpClient();
        }

        $this->baseUri = $baseUri;
        $this->clientHelper = new ClientHelper();
    }

    /**
     * @param RequestOption $requestOption
     * @return LanguageCollectionResponseDTO
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidSource
     * @throws MappingError
     */
    public function getLanguages(RequestOptionInterface $requestOption = new RequestOption()): LanguageCollectionResponseDTO
    {
        $url = $this->clientHelper->applyRequestOption($this->baseUri, EndpointEnum::LANGUAGES->value, $requestOption);
        $response = $this->httpClient->get($url);

        return (new LanguageCollectionResponseMaker($response))
            ->make();
    }

    /**
     * @param RequestOption $requestOption
     * @return CountryCollectionResponseDTO
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidSource
     * @throws MappingError
     */
    public function getCountries(RequestOptionInterface $requestOption = new RequestOption()): CountryCollectionResponseDTO
    {
        $url = $this->clientHelper->applyRequestOption($this->baseUri, EndpointEnum::COUNTRIES->value, $requestOption);
        $response = $this->httpClient->get($url);

        return (new CountryCollectionResponseMaker($response))
            ->make();
    }

    /**
     * @param RequestOption $requestOption
     * @return ImageCollectionResponseDTO
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidSource
     * @throws MappingError
     */
    public function getImages(RequestOptionInterface $requestOption = new RequestOption()): ImageCollectionResponseDTO
    {
        $url = $this->clientHelper->applyRequestOption($this->baseUri, EndpointEnum::IMAGES->value, $requestOption);
        $response = $this->httpClient->get($url);

        return (new ImageCollectionResponseMaker($response))
            ->make();
    }

    /**
     * @param RequestOption $requestOption
     * @return TypologyCollectionResponseDTO
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidSource
     * @throws MappingError
     */
    public function getTypologies(RequestOptionInterface $requestOption = new RequestOption()): TypologyCollectionResponseDTO
    {
        $url = $this->clientHelper->applyRequestOption($this->baseUri, EndpointEnum::TYPOLOGIES->value, $requestOption);
        $response = $this->httpClient->get($url);

        return (new TypologyCollectionResponseMaker($response))
            ->make();
    }

    /**
     * @param RequestOption $requestOption
     * @return BreweryCollectionResponseDTO
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidSource
     * @throws MappingError
     */
    public function getBreweries(RequestOptionInterface $requestOption = new RequestOption()): BreweryCollectionResponseDTO
    {
        $url = $this->clientHelper->applyRequestOption($this->baseUri, EndpointEnum::BREWERIES->value, $requestOption);
        $response = $this->httpClient->get($url);

        return (new BreweryCollectionResponseMaker($response))
            ->make();
    }

    /**
     * @param RequestOption $requestOption
     * @return GlassCollectionResponseDTO
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidSource
     * @throws MappingError
     */
    public function getGlasses(RequestOptionInterface $requestOption = new RequestOption()): GlassCollectionResponseDTO
    {
        $url = $this->clientHelper->applyRequestOption($this->baseUri, EndpointEnum::GLASSES->value, $requestOption);
        $response = $this->httpClient->get($url);

        return (new GlassCollectionResponseMaker($response))
            ->make();
    }

    /**
     * @param RequestOption $requestOption
     * @return FermentationMethodCollectionResponseDTO
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidSource
     * @throws MappingError
     */
    public function getFermentationMethods(RequestOptionInterface $requestOption = new RequestOption()): FermentationMethodCollectionResponseDTO
    {
        $url = $this->clientHelper->applyRequestOption($this->baseUri, EndpointEnum::FERMENTATION_METHODS->value, $requestOption);
        $response = $this->httpClient->get($url);

        return (new FermentationMethodCollectionMaker($response))
            ->make();
    }

    /**
     * @param RequestOption $requestOption
     * @return FoamCollectionResponseDTO
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidSource
     * @throws MappingError
     */
    public function getFoams(RequestOptionInterface $requestOption = new RequestOption()): FoamCollectionResponseDTO
    {
        $url = $this->clientHelper->applyRequestOption($this->baseUri, EndpointEnum::FOAMS->value, $requestOption);
        $response = $this->httpClient->get($url);

        return (new FoamCollectionResponseMaker($response))
            ->make();
    }

    /**
     * @param RequestOption $requestOption
     * @return BeerCollectionResponseDTO
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidSource
     * @throws MappingError
     */
    public function getBeers(RequestOptionInterface $requestOption = new RequestOption()): BeerCollectionResponseDTO
    {
        $url = $this->clientHelper->applyRequestOption($this->baseUri, EndpointEnum::BEERS->value, $requestOption);
        $response = $this->httpClient->get($url);

        return (new BeerCollectionResponseMaker($response))
            ->make();
    }

    /**
     * @param string $id
     * @return LanguageResponseDTO
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidSource
     * @throws MappingError
     */
    public function getLanguage(string $id): LanguageResponseDTO
    {
        $requestOption = (new RequestOption())
            ->setId($id);

        $url = $this->clientHelper->applyRequestOption($this->baseUri, EndpointEnum::LANGUAGES->value, $requestOption);
        $response = $this->httpClient->get($url);

        return (new LanguageResponseMaker($response))
            ->make();
    }

    /**
     * @param string $id
     * @return CountryResponseDTO
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidSource
     * @throws MappingError
     */
    public function getCountry(string $id): CountryResponseDTO
    {
        $requestOption = (new RequestOption())
            ->setId($id);

        $url = $this->clientHelper->applyRequestOption($this->baseUri,EndpointEnum::COUNTRIES->value, $requestOption);
        $response = $this->httpClient->get($url);

        return (new CountryResponseMaker($response))
            ->make();
    }

    /**
     * @param string $id
     * @return ImageResponseDTO
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidSource
     * @throws MappingError
     */
    public function getImage(string $id): ImageResponseDTO
    {
        $requestOption = (new RequestOption())
            ->setId($id);

        $url = $this->clientHelper->applyRequestOption($this->baseUri,EndpointEnum::IMAGES->value, $requestOption);
        $response = $this->httpClient->get($url);

        return (new ImageResponseMaker($response))
            ->make();
    }

    /**
     * @param string $id
     * @return TypologyResponseDTO
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidSource
     * @throws MappingError
     */
    public function getTypology(string $id): TypologyResponseDTO
    {
        $requestOption = (new RequestOption())
            ->setId($id);

        $url = $this->clientHelper->applyRequestOption($this->baseUri,EndpointEnum::TYPOLOGIES->value, $requestOption);
        $response = $this->httpClient->get($url);

        return (new TypologyResponseMaker($response))
            ->make();
    }

    /**
     * @param string $id
     * @return BreweryResponseDTO
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidSource
     * @throws MappingError
     */
    public function getBrewery(string $id): BreweryResponseDTO
    {
        $requestOption = (new RequestOption())
            ->setId($id);

        $url = $this->clientHelper->applyRequestOption($this->baseUri,EndpointEnum::BREWERIES->value, $requestOption);
        $response = $this->httpClient->get($url);

        return (new BreweryResponseMaker($response))
            ->make();
    }

    /**
     * @param string $id
     * @return GlassResponseDTO
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidSource
     * @throws MappingError
     */
    public function getGlass(string $id): GlassResponseDTO
    {
        $requestOption = (new RequestOption())
            ->setId($id);

        $url = $this->clientHelper->applyRequestOption($this->baseUri,EndpointEnum::GLASSES->value, $requestOption);
        $response = $this->httpClient->get($url);

        return (new GlassResponseMaker($response))
            ->make();
    }

    /**
     * @param string $id
     * @return FermentationMethodResponseDTO
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidSource
     * @throws MappingError
     */
    public function getFermentationMethod(string $id): FermentationMethodResponseDTO
    {
        $requestOption = (new RequestOption())
            ->setId($id);

        $url = $this->clientHelper->applyRequestOption($this->baseUri,EndpointEnum::FERMENTATION_METHODS->value, $requestOption);
        $response = $this->httpClient->get($url);

        return (new FermentationMethodResponseMaker($response))
            ->make();
    }

    /**
     * @param string $id
     * @return FoamResponseDTO
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidSource
     * @throws MappingError
     */
    public function getFoam(string $id): FoamResponseDTO
    {
        $requestOption = (new RequestOption())
            ->setId($id);

        $url = $this->clientHelper->applyRequestOption($this->baseUri,EndpointEnum::FOAMS->value, $requestOption);
        $response = $this->httpClient->get($url);

        return (new FoamResponseMaker($response))
            ->make();
    }

    /**
     * @param string $id
     * @return BeerResponseDTO
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidSource
     * @throws MappingError
     */
    public function getBeer(string $id): BeerResponseDTO
    {
        $requestOption = (new RequestOption())
            ->setId($id);

        $url = $this->clientHelper->applyRequestOption($this->baseUri,EndpointEnum::BEERS->value, $requestOption);
        $response = $this->httpClient->get($url);

        return (new BeerResponseMaker($response))
            ->make();
    }
}
