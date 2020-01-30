<?php

namespace OCA\TestApp\Entity;

use OCP\AppFramework\Db\Mapper;
use OCP\IDBConnection;

/**
 * Class ThingMapper
 * @package OCA\TestApp\Entity
 */
class ThingMapper extends Mapper
{

    public function __construct(IDBConnection $db)
    {
        parent::__construct($db, 'testapp_thing', Thing::class);
    }


    public function findAll($userId, $orderBy = "id", $orderDir = "ASC", $limit=null, $offset=null) {
        $sql = "SELECT * FROM " . $this->getTableName() .
            " WHERE `uid` = ?" .
            " ORDER BY ${orderBy} ${orderDir}"
        ;
        $params = [$userId];
        return $this->findEntities($sql, $params, $limit, $offset);
    }

}