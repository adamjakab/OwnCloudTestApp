<?php

namespace OCA\testapp\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Schema\SchemaException;
use OCA\TestApp\Database\Helper as DatabaseHelper;
use OCP\Migration\ISchemaMigration;

/**
 * Base Migration
 */
class Version20200130094318 implements ISchemaMigration
{
    /** @var string (oc_ ) */
    private $prefix;

    /**
     * @param Schema $schema
     * @param array $options
     * @throws SchemaException
     */
    public function changeSchema(Schema $schema, array $options)
    {
        $this->prefix = $options['tablePrefix'];
        //
        $this->createTableOfThings($schema, $options);
    }

    /**
     * @param Schema $schema
     * @param array $options
     * @throws SchemaException
     */
    private function createTableOfThings(Schema $schema, array $options)
    {
        $tableName = DatabaseHelper::getAppTableName($this->prefix, "thing");

        // CREATE TABLE
        if (!$schema->hasTable($tableName)) {
            $schema->createTable($tableName);
        }
        $table = $schema->getTable($tableName);


        // DROP INDICES
        //$table->dropIndex(DatabaseHelper::getIndexName($tableName, ['col_name']));


        // DROP COLUMNS
        //$table->dropColumn("");


        // CREATE COLUMNS
        DatabaseHelper::ensureTableColumn($table, "id", "integer", [
            'autoincrement' => true,
            'unsigned' => true,
            'notnull' => true,
            'length' => 11,
        ]);

        DatabaseHelper::ensureTableColumn($table, "uid", "string", [
            'notnull' => true,
            'length' => 64,
        ]);


        DatabaseHelper::ensureTableColumn($table, "thing_name", "string", [
            'notnull' => true,
            'length' => 128,
        ]);

        DatabaseHelper::ensureTableColumn($table, "thing_value", "string", [
            'notnull' => true,
            'length' => 255,
        ]);

        // CREATE PRIMARY KEY
        if (!$table->hasPrimaryKey())
        {
            $table->setPrimaryKey(['id']);
        }

        // CREATE INDICES
        DatabaseHelper::ensureTableIndex($table, ['uid']);
        DatabaseHelper::ensureTableIndex($table, ['uid', 'thing_name']);
    }
}
