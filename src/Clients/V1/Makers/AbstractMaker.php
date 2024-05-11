<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Makers;

use CuyZ\Valinor\Mapper\MappingError;
use CuyZ\Valinor\Mapper\Source\Source;
use CuyZ\Valinor\MapperBuilder;
use MalvikLab\BrewBuddyClient\Clients\V1\DTO\RateLimitDTO;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractMaker
{
    /**
     * @param ResponseInterface $response
     */
    public function __construct(readonly public ResponseInterface $response)
    {}

    /**
     * @return RateLimitDTO
     * @throws MappingError
     */
    public function makeRateLimit(): RateLimitDTO
    {
        $rateLimitData = [
            'limit' => (int)$this->response->getHeader('X-Ratelimit-Limit')[0],
            'remaining' => (int)$this->response->getHeader('X-Ratelimit-Remaining')[0]
        ];

        return (new MapperBuilder())
            ->mapper()
            ->map(RateLimitDTO::class, Source::array($rateLimitData));
    }
}