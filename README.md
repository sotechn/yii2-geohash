# Yii-2 GeoHash

## Description

Generate geohash, it is a hierarchical spatial data structure which subdivides space into buckets of grid shape, which is one of the many applications of what is known as a Z-order curve, and generally space-filling curves. See more https://en.wikipedia.org/wiki/Geohash

## Getting Started

### Install

	composer require sotechn/yii2-geohash

or add you composer.json

	"require": {
		...
		"sotechn/yii2-geohash": "~0.1.0"
    },

### System Requirements

You need **PHP >= 5.4.0**, **Yii ~ 2.0.4**

### Usage

in your config file

	/congig/web.php

added component:

	'components' => [
		...
		'geohash' => [
			'class' => 'sotechn\geohash\Geohash',
		],
	]

after you've added it, you can use it as

	$hash = Yii::$app->geohash->encode($longitude, $latitude, $prec);

and you can also use behavior with his model

	public function behaviors()
    {
        return [
			...
			['class' => \sotechn\geohash\behaviors\Geohash::className(),]
        ];
    }

you can specify their fields to be used and precision that you use in your default project:

	[
		'class' => \sotechn\geohash\behaviors\Geohash::className(),
		'fieldLng' => 'longitude', // default **lng**
		'fieldLat' => 'latitude', // default **ltd**
		'fieldHash' => 'hash', // default **geohash**
		'defaultPrec' => '0.00000001', // deefault **0.00001**
	]

