# WikidataQueryApi

[![Build Status](https://scrutinizer-ci.com/g/ProjetPP/WikidataQueryApi/badges/build.png?b=master)](https://scrutinizer-ci.com/g/ProjetPP/WikidataQueryApi/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/ProjetPP/WikidataQueryApi/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/ProjetPP/WikidataQueryApi/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ProjetPP/WikidataQueryApi/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ProjetPP/WikidataQueryApi/?branch=master)
[![Dependency Status](https://www.versioneye.com/php/ppp:wikidataquery-api/dev-master/badge.svg)](https://www.versioneye.com/php/ppp:wikidataquery-api/dev-master)

On [Packagist](https://packagist.org/packages/ppp/wikidataquery-api):
[![Latest Stable Version](https://poser.pugx.org/ppp/wikidataquery-api/version.png)](https://packagist.org/packages/ppp/wikidataquery-api)
[![Download count](https://poser.pugx.org/ppp/wikidataquery-api/d/total.png)](https://packagist.org/packages/ppp/wikidataquery-api)


WikidataQueryApi is a small wrapper for the [WikidataQuery](https://wdq.wmflabs.org) tool. It only supports a subset of
the [query syntax](https://wdq.wmflabs.org/api_documentation.html).

## Installation

Use one of the below methods:

1 - Use composer to install the library and all its dependencies using the master branch:

    composer require "ppp/wikidataquery-api":dev-master"

2 - Create a composer.json file that just defines a dependency on version 1.0 of this package, and run 'composer install' in the directory:

    {
        "require": {
            "ppp/wikidataquery-api": "~1.0"
        }
    }


## Example

Here is a small usage example:

```php
// Load everything
require_once( __DIR__ . "/vendor/autoload.php" );

// Initialise HTTP connection
$api = new WikidataQueryApi( 'https://wdq.wmflabs.org/api' );

// Build helper tools
$wikidataQueryFactory = new WikidataQueryFactory( $api );
$simpleQueryService = $wikidataQueryFactory->newSimpleQueryService());

//Do a query that returns a list of ItemId
//This query finds all the children (P40) of Charlemagne (Q3044)
$itemIds = $simpleQueryService->doQuery(
	new ClaimQuery(new PropertyId('P17'), new ItemId('Q3044'));
);
```
