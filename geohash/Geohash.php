<?php

namespace sotechn\geohash;

/**
 * Description of Geohash
 *
 * @author Mikhail Saprykin <git@so-technology.ru>
 * @copyright (c) 2016, Mikhail Saprykin
 * @link http://so-technology.ru
 */
class Geohash extends \yii\base\Component {

	/**
	 * Encode coordinate to geohash
	 *
	 * @param float $lng longitude coordinate
	 * @param float $lat latitude coordinate
	 * @param float $prec precision
	 * @return string geohash coordinate
	 */
	public function encode($lng, $lat, $prec = 0.00001) {

		return \Lvht\GeoHash::encode($lng, $lat, $prec);
	}

	/**
	 * Decode geohash to a geographical area
	 *
	 * @param string $geohash string geohash
	 * @return array [$minlng, $maxlng, $minlat, $maxlat]
	 */
	public function decode($geohash) {

		return \Lvht\GeoHash::decode($geohash);
	}

	/**
	 * Returns a rectangle that is encoded in the hash coordinate precision specified
	 *
	 * @param string $geohash  string geohash
	 * @return array [[$minlng, $minlat], [$minlng, $maxlat], [$maxlng, $maxlat], [$maxlng, $minlat]]
	 */
	public function gteRect($geohash) {

		return \Lvht\GeoHash::getRect($geohash);
	}

	/**
	 * Find the neighbors for a given geohash
	 *
	 * @param string $geohash string geohash
	 * @return array return array of string with new geohash
	 */
	public function expand($geohash) {

		return \Lvht\GeoHash::expand($geohash);
	}

}
