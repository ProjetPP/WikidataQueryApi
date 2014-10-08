<?php

if ( php_sapi_name() !== 'cli' ) {
	die( 'Not an entry point' );
}

if ( !is_readable( __DIR__ . '/../vendor/autoload.php' ) ) {
	die( 'You need to install this package with Composer before you can run the tests' );
}

$loader = require_once( __DIR__ . '/../vendor/autoload.php' );
$loader->addClassMap( array(
	'WikidataQueryApi\DataModel\Serializers\SerializerBaseTest' => __DIR__ . '/unit/DataModel/Serializers/SerializerBaseTest.php',
) );