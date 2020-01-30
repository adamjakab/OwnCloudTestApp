<?php

namespace OCA\TestApp\Database;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Schema\SchemaException;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Types\Type;
use OCA\TestApp\AppInfo\Application as TestAppApplication;


/**
 * Class Helper
 * @package OCA\testapp\Migrations
 */
class Helper
{
    /**
     * @param Table $table
     * @param string $column_name
     * @param string $type
     * @param array $options
     */
    public static function ensureTableColumn(Table $table, string $column_name, string $type, array $options)
    {
        if(!$table->hasColumn($column_name))
        {
            $table->addColumn($column_name, $type, $options);
        } else {
            try {
                $column = $table->getColumn($column_name);
            } catch (SchemaException $e) {
                return;
            }
            if ($column->getType()->getName() != $type)
            {
                try {
                    $columnType = Type::getType($type);
                } catch (DBALException $e) {
                    return;
                }
                $column->setType($columnType);
            }
            $column->setOptions($options);
        }
    }

    /**
     * @param Table $table
     * @param array $index_columns
     * @param array $flags
     * @param array $options
     */
    public static function ensureTableIndex(Table $table, array $index_columns, $flags = [], $options = [])
    {
        $index_name = self::getIndexName($table->getName(), $index_columns);
        if (!$table->hasIndex($index_name))
        {
            $table->addIndex($index_columns, $index_name, $flags, $options);
        }
    }

    /**
     * @param string $table_name
     * @param array $columns
     * @return string
     */
    public static function getIndexName(string $table_name, array $columns)
    {
        return $table_name . "_" . join("_", $columns);
    }

    /**
     * @param string $table_prefix
     * @param string $table_name
     * @return string
     */
    public static function getAppTableName(string $table_prefix, string $table_name)
    {
        return $table_prefix . TestAppApplication::application_name . "_" . $table_name;
    }
}
