# Brew Buddy API Client

## What is Brew Buddy?
[Brew Buddy](https://brewbuddy.dev) is your companion in beer discovery. Whether you're a passionate homebrewer or a talented developer eager to create innovative applications, he is here to support you.

Explore the vast universe of beers through rich APIs filled with accurate data. From ingredient profiles to sensory characteristics, you'll have access to a wealth of information to enhance your applications or websites.

## Installation
```
composer require malvik-lab/brewbuddy-api-client
```

## Initializing
```php
<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client as HttpClient;
use MalvikLab\BrewBuddyClient\Client;

$brewBuddyClient = Client::make(Client::CLIENT_V1, new HttpClient());
```

## Client Methods
| METHOD                 | ARGUMENTS                                       |
|------------------------|-------------------------------------------------|
| getLanguages           | [RequestOption](#request-option) $requestOption |
| getCountries           | [RequestOption](#request-option) $requestOption |
| getImages              | [RequestOption](#request-option) $requestOption |
| getTypologies          | [RequestOption](#request-option) $requestOption |
| getBreweries           | [RequestOption](#request-option) $requestOption |
| getGlasses             | [RequestOption](#request-option) $requestOption |
| getFermentationMethods | [RequestOption](#request-option) $requestOption |
| getFoams               | [RequestOption](#request-option) $requestOption |
| getBeers               | [RequestOption](#request-option) $requestOption |

## Basic use
```php
<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client as HttpClient;
use MalvikLab\BrewBuddyClient\Client;

$brewBuddyClient = Client::make(Client::CLIENT_V1, new HttpClient());
$beers = $brewBuddyClient->getBeers();
```

## Request Option
The RequestOption class represents request options for API calls. It provides methods to configure pagination, sorting, and filtering options for specific requests.

| METHOD | ARGUMENTS                   | DEFAULT VALUES | DESCRIPTION                                |
|--------|-----------------------------|----------------|--------------------------------------------|
| setId  | string $id                  |                | Set the identifier of the requested object |
| setPage | int $page                   | 1              | Set the page number of the results         |
| setLimit | int $limit                  | 20             | Set the maximum number of results per page |
| setSort | string $sort                |                | Set the field to order the results by      |
| setOrder | string $order               | asc            | Set the sorting direction                  |
| addFilterByFullTextSearch | mixed $value |                | Add a filter for full text search          |
| addFilterByExactMatch | string $field, mixed $value |                | Add a filter for exact match search                                 |
| addFilterByPartialMatch | string $field, mixed $value |                | Add a filter for partial match search                               |
| addFilterByLessThanOrEqualValue | string $field, mixed $value |                | Add a filter for searching based on less than or equal to value     |
| addFilterByGreaterThanOrEqualValue | string $field, mixed $value |                | Aggiunge un filtro per la ricerca basata su valore maggiore o uguale |
| getId |                             |                | Returns the identifier of the requested object                      |
| getPage |                             |                | Returns the page number of the results                              |
| getLimit |                             |                | Returns the maximum number of results per page                      |
| getSort |                             |                | Returns the field to order the results by                           |
| getOrder |                             |                | Returns the sorting direction                                       |
| getFilters |                             |                | Returns the filters for searching results                           |

## Advanced usage

```php
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
```

## Output example
```php
$beer = $brewBuddyClient->getBeer('0692bda5-b13e-4596-a3c0-e88c404490be');
```

```php
MalvikLab\BrewBuddyClient\Clients\V1\DTO\BeerResponseDTO Object
(
    [rateLimit] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\RateLimitDTO Object
        (
            [limit] => 60
            [remaining] => 58
        )

    [beer] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\BeerDTO Object
        (
            [id] => 0692bda5-b13e-4596-a3c0-e88c404490be
            [name] => The Godfather
            [breweryId] => 9b960c84-57d8-45cd-bada-780357736b42
            [typologyId] => 9b97543e-4e83-4b4a-aed4-cb8ace04d38a
            [imageId] => ca0b147f-7c20-4334-bf0c-b0932331ba15
            [fermentationMethodId] => 9ba5d514-e816-48ac-8bcd-e667cb49f7a3
            [foamId] => 9ba602ea-d1c2-40af-920d-c230bbc8de19
            [releasedYear] => 1980
            [available] => 1
            [abv] => 5.7
            [ibu] => 74
            [srm] => 9
            [filtrated] => 1
            [pastorized] =>
            [minimumServingTemperature] => 1
            [maximumServingTemperature] => 9
            [typology] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\TypologyDTO Object
                (
                    [id] => 9b97543e-4e83-4b4a-aed4-cb8ace04d38a
                    [name] => Stout
                    [translations] => Array
                        (
                            [0] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\TypologyTranslationDTO Object
                                (
                                    [id] => 9b975729-c68b-4a28-93e6-8890cf47f344
                                    [languageId] => 9b95924e-c6a7-4d1a-94c6-a6a8e5527af4
                                    [typologyId] => 9b97543e-4e83-4b4a-aed4-cb8ace04d38a
                                    [description] => Stout are dark beers that undergo top fermentation and are produced using roasted barley malt and roasted barley.

There are several types of Stout, such as:

Dry Stout: very dark with a "roasted" flavor
Imperial Stout: dark beers originating in England with a high alcohol content
Porters: which we have already seen previously
Milk Stout: beers containing lactose
Chocolate Stout: a beer with a strong flavor that vaguely resembles dark chocolate.
                                    [language] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\LanguageDTO Object
                                        (
                                            [id] => 9b95924e-c6a7-4d1a-94c6-a6a8e5527af4
                                            [name] => English
                                            [code] => en
                                        )

                                )

                            [1] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\TypologyTranslationDTO Object
                                (
                                    [id] => 9b975729-c77a-44f0-a422-56cffbbebeb7
                                    [languageId] => 9b95924e-d0ab-498b-bb71-ec2e228363ee
                                    [typologyId] => 9b97543e-4e83-4b4a-aed4-cb8ace04d38a
                                    [description] => Le Stout sono birre scure ad alta fermentazione che vengono prodotte mediante l’aggiunta di malto d’orzo e orzo tostati.

Esistono diversi tipi di Stout, come ad esempio:

Le Dry Stout, molto scure e dal sapore “tostato”
Le Imperial Stout, birre scure nate in Inghilterra con un’alta gradazione alcolica
Le Porter, che abbiamo già visto in precedenza
Le Milk Stout, birre contenenti lattosio
Le Chocolate Stout, una birra da un sapore deciiso che ricorda vagamente il cioccolato fondente.
                                    [language] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\LanguageDTO Object
                                        (
                                            [id] => 9b95924e-d0ab-498b-bb71-ec2e228363ee
                                            [name] => Italian
                                            [code] => it
                                        )

                                )

                        )

                )

            [image] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\ImageDTO Object
                (
                    [id] => ca0b147f-7c20-4334-bf0c-b0932331ba15
                    [url] => https://i.ibb.co/rv2k3Ss/ca0b147f-7c20-4334-bf0c-b0932331ba15.jpg
                    [filename] => ca0b147f-7c20-4334-bf0c-b0932331ba15.jpg
                    [extension] => jpg
                    [size] => 114203
                )

            [brewery] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\BreweryDTO Object
                (
                    [id] => 9b960c84-57d8-45cd-bada-780357736b42
                    [name] => ChuckleCraft Brewery
                    [countryId] => 9b95b6b2-6142-408c-b5f0-7747cb2d7685
                    [imageId] => 9834efd7-dbdc-4485-9b2f-b81006c31fdc
                    [foundedYear] => 2011
                    [country] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\CountryDTO Object
                        (
                            [id] => 9b95b6b2-6142-408c-b5f0-7747cb2d7685
                            [code] => IT
                            [translations] => Array
                                (
                                    [0] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\CountryTranslationDTO Object
                                        (
                                            [id] => 9ba622a8-5602-46fa-8d04-ad2679f5576c
                                            [languageId] => 9b95924e-c6a7-4d1a-94c6-a6a8e5527af4
                                            [countryId] => 9b95b6b2-6142-408c-b5f0-7747cb2d7685
                                            [name] => Italy
                                            [language] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\LanguageDTO Object
                                                (
                                                    [id] => 9b95924e-c6a7-4d1a-94c6-a6a8e5527af4
                                                    [name] => English
                                                    [code] => en
                                                )

                                        )

                                    [1] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\CountryTranslationDTO Object
                                        (
                                            [id] => 9ba6240e-8aa9-4dbf-a79e-c6466249323d
                                            [languageId] => 9b95924e-d0ab-498b-bb71-ec2e228363ee
                                            [countryId] => 9b95b6b2-6142-408c-b5f0-7747cb2d7685
                                            [name] => Italia
                                            [language] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\LanguageDTO Object
                                                (
                                                    [id] => 9b95924e-d0ab-498b-bb71-ec2e228363ee
                                                    [name] => Italian
                                                    [code] => it
                                                )

                                        )

                                )

                        )

                    [image] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\ImageDTO Object
                        (
                            [id] => 9834efd7-dbdc-4485-9b2f-b81006c31fdc
                            [url] => https://i.ibb.co/9qFj4Gq/9834efd7-dbdc-4485-9b2f-b81006c31fdc.jpg
                            [filename] => 9834efd7-dbdc-4485-9b2f-b81006c31fdc.jpg
                            [extension] => jpg
                            [size] => 131985
                        )

                    [translations] => Array
                        (
                            [0] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\BreweryTranslationDTO Object
                                (
                                    [id] => 9b9740cb-3f65-4ac0-b82c-8f79b83569d5
                                    [languageId] => 9b95924e-c6a7-4d1a-94c6-a6a8e5527af4
                                    [breweryId] => 9b960c84-57d8-45cd-bada-780357736b42
                                    [history] => In the picturesque Italian landscape, amidst rolling hills and sunflower fields, stood the ChuckleCraft Brewery. This brewery had a truly unique and funny story, as it counted a whopping 100 founders!

It all began during a meeting of a beer enthusiasts' club in the heart of Rome. During a heated debate about which beers were the best, the club members decided to put their brewing skills to the test and found their own brewery.

With great enthusiasm, all 100 club members came together to realize their brewing dream. Each of them brought with them a unique passion for beer and a special recipe they wanted to share with the world.

ChuckleCraft Brewery soon became a true collective endeavor. Each member contributed their skills and resources, whether it was brewing knowledge, business experience, or simply a great sense of humor.

Naturally, with so many people involved, there were moments of chaos and confusion. Board meetings often turned into lively discussions about which beer to produce next or what the funniest name should be for a new creation.

Despite the challenges, the 100 founders of ChuckleCraft Brewery always maintained their cheerful and positive spirit. Every obstacle was faced with a laugh and a fresh beer as they worked together to create something truly special.

And so, thanks to their determination, passion, and contagious humor, ChuckleCraft Brewery became a landmark in the Italian beer scene, bringing joy and laughter to all who crossed its doors.
                                    [language] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\LanguageDTO Object
                                        (
                                            [id] => 9b95924e-c6a7-4d1a-94c6-a6a8e5527af4
                                            [name] => English
                                            [code] => en
                                        )

                                )

                            [1] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\BreweryTranslationDTO Object
                                (
                                    [id] => 9b9740cb-45f0-4be4-a4a0-bd0f14f5df40
                                    [languageId] => 9b95924e-d0ab-498b-bb71-ec2e228363ee
                                    [breweryId] => 9b960c84-57d8-45cd-bada-780357736b42
                                    [history] => Nel suggestivo paesaggio italiano, tra le colline ondulate e i campi di girasoli, spiccava la ChuckleCraft Brewery. Questo birrificio aveva una storia davvero unica e buffa, poiché contava ben 100 fondatori!

Tutto ebbe inizio durante una riunione di un club di appassionati di birra nel cuore di Roma. Durante un acceso dibattito su quali birre fossero le migliori, i membri del club decisero di mettere alla prova le proprie abilità di birrai e di fondare un birrificio tutto loro.

Con grande entusiasmo, tutti e 100 i membri del club si unirono per realizzare il loro sogno birraio. Ognuno di loro portava con sé una passione unica per la birra e una ricetta speciale che voleva condividere con il mondo.

La ChuckleCraft Brewery divenne presto una vera e propria opera di collaborazione collettiva. Ogni membro contribuiva con le proprie competenze e risorse, che fossero conoscenze di birrificazione, esperienza commerciale o semplicemente un grande senso dell'umorismo.

Naturalmente, con così tante persone coinvolte, ci furono momenti di caos e confusione. Le riunioni del consiglio si trasformavano spesso in vivaci discussioni su quale sarebbe stata la prossima birra da produrre o su quale dovesse essere il nome più divertente da dare a una nuova creazione.

Nonostante le sfide, i 100 fondatori della ChuckleCraft Brewery mantennero sempre il loro spirito allegro e positivo. Ogni ostacolo veniva affrontato con una risata e una birra fresca, mentre lavoravano insieme per creare qualcosa di davvero speciale.

E così, grazie alla loro determinazione, alla loro passione e al loro umorismo contagioso, la ChuckleCraft Brewery divenne un punto di riferimento nel panorama della birra italiana, portando gioia e risate a tutti coloro che attraversavano le sue porte.
                                    [language] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\LanguageDTO Object
                                        (
                                            [id] => 9b95924e-d0ab-498b-bb71-ec2e228363ee
                                            [name] => Italian
                                            [code] => it
                                        )

                                )

                        )

                )

            [recommendedGlasses] => Array
                (
                )

            [fermentationMethod] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\FermentationMethodDTO Object
                (
                    [id] => 9ba5d514-e816-48ac-8bcd-e667cb49f7a3
                    [code] => LGR
                    [translations] => Array
                        (
                            [0] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\FermentationMethodTranslationDTO Object
                                (
                                    [id] => 9ba5d514-e8a0-4695-af95-5065a28397c7
                                    [languageId] => 9b95924e-d0ab-498b-bb71-ec2e228363ee
                                    [fermentationMethodId] => 9ba5d514-e816-48ac-8bcd-e667cb49f7a3
                                    [name] => Lager
                                    [description] => Le birre Lager vengono fermentate a temperature più basse (generalmente tra i 7°C e i 13°C) utilizzando ceppi di lieviti a bassa fermentazione, come ad esempio il Saccharomyces pastorianus. Questo metodo produce birre con una fermentazione più lenta e più pulita, come ad esempio le Pilsner, le Märzen e le Bock.
                                    [language] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\LanguageDTO Object
                                        (
                                            [id] => 9b95924e-d0ab-498b-bb71-ec2e228363ee
                                            [name] => Italian
                                            [code] => it
                                        )

                                )

                            [1] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\FermentationMethodTranslationDTO Object
                                (
                                    [id] => 9ba5d514-e921-420d-b668-4c9376ec8293
                                    [languageId] => 9b95924e-c6a7-4d1a-94c6-a6a8e5527af4
                                    [fermentationMethodId] => 9ba5d514-e816-48ac-8bcd-e667cb49f7a3
                                    [name] => Lager
                                    [description] => Lager beers are fermented at lower temperatures (typically between 7°C and 13°C) using strains of bottom-fermenting yeast, such as Saccharomyces pastorianus. This method produces beers with a slower and cleaner fermentation, such as Pilsners, Märzens, and Bocks.
                                    [language] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\LanguageDTO Object
                                        (
                                            [id] => 9b95924e-c6a7-4d1a-94c6-a6a8e5527af4
                                            [name] => English
                                            [code] => en
                                        )

                                )

                        )

                )

            [foam] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\FoamDTO Object
                (
                    [id] => 9ba602ea-d1c2-40af-920d-c230bbc8de19
                    [code] => THK
                    [translations] => Array
                        (
                            [0] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\FoamTranslationDTO Object
                                (
                                    [id] => 9ba602ea-d2a1-4ee0-ba8d-01b82ffbd434
                                    [languageId] => 9b95924e-d0ab-498b-bb71-ec2e228363ee
                                    [foamId] => 9ba602ea-d1c2-40af-920d-c230bbc8de19
                                    [name] => Spessa
                                    [language] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\LanguageDTO Object
                                        (
                                            [id] => 9b95924e-d0ab-498b-bb71-ec2e228363ee
                                            [name] => Italian
                                            [code] => it
                                        )

                                )

                            [1] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\FoamTranslationDTO Object
                                (
                                    [id] => 9ba602ea-d385-42ad-ad9c-8aa0b69683bb
                                    [languageId] => 9b95924e-c6a7-4d1a-94c6-a6a8e5527af4
                                    [foamId] => 9ba602ea-d1c2-40af-920d-c230bbc8de19
                                    [name] => Thick
                                    [language] => MalvikLab\BrewBuddyClient\Clients\V1\DTO\LanguageDTO Object
                                        (
                                            [id] => 9b95924e-c6a7-4d1a-94c6-a6a8e5527af4
                                            [name] => English
                                            [code] => en
                                        )

                                )

                        )

                )

        )

)
```

## Running Test
```sh
vendor/bin/phpunit Tests/Integration/V1 --testdox
```




































