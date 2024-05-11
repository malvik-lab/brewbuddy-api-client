<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client as HttpClient;
use MalvikLab\BrewBuddyClient\Client;
use MalvikLab\BrewBuddyClient\Clients\V1\Options\RequestOption;

$brewBuddyClient = Client::make(Client::CLIENT_V1, new HttpClient());

$requestOption = (new RequestOption())
    ->setPage(1)
    ->setLimit(3)
    ->setSort('name')
    ->setOrder(RequestOption::ORDER_ASC)
    ->addFilterByGreaterThanOrEqualValue('releasedYear', 1980)
    ->addFilterByPartialMatch('name', 'Mamma')
    ->addFilterByExactMatch('filtrated', true)
    ->addFilterByExactMatch('typology.id', '9b97543e-4841-4b49-a5d4-9bdd9e0b8e95')
    ->addFilterByLessThanOrEqualValue('image.size', 187123)
;

$beers = $brewBuddyClient->getBeers($requestOption);

$beer = $brewBuddyClient->getBeer('0692bda5-b13e-4596-a3c0-e88c404490be');
print_r($beer);
