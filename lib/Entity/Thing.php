<?php

namespace OCA\TestApp\Entity;

use OCP\AppFramework\Db\Entity;

/**
 * Class Thing
 * @package OCA\TestApp\Entity
 *
 * @method integer getId()
 * @method void setId(integer $value)
 * @method string getUid()
 * @method void setUid(string $value)
 * @method string getThingName()
 * @method void setThingName(string $value)
 * @method string getThingValue()
 * @method void setThingValue(string $value)
 *
 */
class Thing extends Entity
{
    public $uid;
    public $thingName;
    public $thingValue;

    public function __construct() {
        //$this->addType('uid', 'string');
    }
}

