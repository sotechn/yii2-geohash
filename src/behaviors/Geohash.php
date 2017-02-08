<?php

namespace sotechn\geohash\behaviors;

use yii\db\ActiveRecord;

/**
 * behavior for setting the geohesha when saving model
 *
 * @author Mikhail Saprykin <git@so-technology.ru>
 * @copyright (c) 2016, Mikhail Saprykin
 * @link http://so-technology.ru
 */
class Geohash extends \yii\base\Behavior {

	/**
	 * @var string Field name the longitude from you model
	 */
	public $fieldLng = 'lng';

	/**
	 * @var string Field name the latitude from you model
	 */
	public $fieldLat = 'lat';

	/**
	 * @var string Field name the GeoHash from you model
	 */
	public $fieldHash = 'geohash';

	/**
	 * @var string Default precision
	 */
	public $defaultPrec = '0.00001';

	/**
	 * Set events function
	 */
	public function events() {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeSave',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeSave',
        ];
    }

	/**
	 * Set geohash before insert and update
	 */
	public function beforeSave() {

		$lng = $this->owner->getAttribute($this->fieldLng);
		$lat = $this->owner->getAttribute($this->fieldLat);

		if ($lat && $lng) {
			$this->owner->setAttribute($this->fieldHash, (new \sotechn\geohash\Geohash())->encode($lng, $lat, $this->defaultPrec));
		}
	}

}
