<?php

namespace MalvikLab\BrewBuddyClient\Clients\V1\Enum;

enum EndpointEnum: string
{
    case LANGUAGES = 'languages';
    case COUNTRIES = 'countries';
    case IMAGES = 'images';
    case TYPOLOGIES = 'typologies';
    case BREWERIES = 'breweries';
    case GLASSES = 'glasses';
    case FERMENTATION_METHODS = 'fermentation_methods';
    case FOAMS = 'foams';
    case BEERS = 'beers';
}