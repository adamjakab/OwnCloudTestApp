<?php

namespace OCA\TestApp\Entity;

use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\Entity;
use OCP\AppFramework\Db\Mapper;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;
use OCP\AppFramework\Http\NotFoundResponse;
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


    public function findAll($userId, $orderBy = "id", $orderDir = "ASC", $limit = null, $offset = null)
    {
        $sql = "SELECT * FROM " . $this->getTableName() .
            " WHERE `uid` = ?" .
            " ORDER BY ${orderBy} ${orderDir}";
        $params = [$userId];
        return $this->findEntities($sql, $params, $limit, $offset);
    }

    public function findOne($userId, $id = "id")
    {
        $sql = "SELECT * FROM " . $this->getTableName() .
            " WHERE `uid` = ? AND `id` = ?";
        $params = [$userId, $id];
        try {
            return $this->findEntity($sql, $params, 1);
        } catch (DoesNotExistException $e) {
            return new NotFoundResponse();
        } catch (MultipleObjectsReturnedException $e) {
            return new NotFoundResponse();
        }
    }

    public function create($userId, $thing_name, $thing_value)
    {
        $entity = new Thing();
        $entity->setUid($userId);
        $entity->setThingName($thing_name);
        $entity->setThingValue($thing_value);
        return $this->insert($entity);
    }

    /**
     * @param string    $userId
     * @param int       $id
     * @param string    $thing_name
     * @param string    $thing_value
     * @return Entity|NotFoundResponse
     */
    public function modify($userId, $id, $thing_name, $thing_value)
    {
        $entity = $this->findOne($userId, $id);

        if ($entity instanceof Thing) {
            $entity->setThingName($thing_name);
            $entity->setThingValue($thing_value);
            $entity = $this->update($entity);
        }

        return $entity;
    }

    /**
     * @param string    $userId
     * @param int       $id
     * @return Entity|NotFoundResponse
     */
    public function remove($userId, $id)
    {
        $entity = $this->findOne($userId, $id);

        if ($entity instanceof Thing) {
            $this->delete($entity);
        }

        return $entity;
    }
}