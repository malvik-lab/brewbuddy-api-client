<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Helpers;

use MalvikLab\BrewBuddyClient\Clients\V1\Options\RequestOption;
use MalvikLab\BrewBuddyClient\Exceptions\InvalidArgumentException;
use MalvikLab\BrewBuddyClient\Helpers\ExceptionHelper;

class ClientHelper
{
    public function __construct()
    {}

    /**
     * @param string $baseUri
     * @param string $endpoint
     * @param RequestOption $requestOption
     * @return string
     * @throws InvalidArgumentException
     */
    public function applyRequestOption(string $baseUri, string $endpoint, RequestOption $requestOption): string
    {
        $url = sprintf('%s/%s',
            $baseUri,
            $endpoint
        );

        if ( $requestOption->getId() )
        {
            return sprintf('%s/%s',
                $url,
                $requestOption->getId());
        }

        $params = [];

        if ( $requestOption->getPage() < 1 )
        {
            throw new InvalidArgumentException(
                ExceptionHelper::message('The page number must be a positive integer.')
            );
        }

        $params['_page'] = $requestOption->getPage();

        if ( $requestOption->getLimit() < 1 )
        {
            throw new InvalidArgumentException(
                ExceptionHelper::message('The limit number must be a positive integer.')
            );
        }

        if ( !is_null($requestOption->getSort()) )
        {
            $params['_sort'] = $requestOption->getSort();
        }

        if ( !is_null($requestOption->getOrder()) )
        {
            if (
                RequestOption::ORDER_ASC !== $requestOption->getOrder() &&
                RequestOption::ORDER_DESC !== $requestOption->getOrder()
            ) {
                throw new InvalidArgumentException(
                    ExceptionHelper::message('The order is not valid.')
                );
            }

            $params['_order'] = $requestOption->getOrder();
        }

        $params['_limit'] = $requestOption->getLimit();


        foreach ( $requestOption->getFilters() as $field => $value )
        {
            $params[$field] = $value;
        }

        if ( count($params) > 0 )
        {
            $url .= '?' . http_build_query($params);
        }

        return $url;
    }
}