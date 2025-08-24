<?php

use DB\Identifier;
use ReflectionClass;

abstract class Model
{    
    abstract public static function setup();
    protected static bool $initialized = false;
    protected static bool $schema_is_handled = false;
    protected static array $properties = []; // Make this an array to store properties for each class
    protected static array $foreignKeys = [];

    protected static ?DB\DB $db = null;

    public static function init(?DB\DB $db)
    {
        // Use a class-specific initialized flag
        $class_initialized = static::class . '_initialized';
        if(!isset($GLOBALS[$class_initialized]) || !$GLOBALS[$class_initialized])
        {
            static::$db = $db ?? DB\DB::$db;

            static::setup();
            static::handleSchema();

            $GLOBALS[$class_initialized] = true;
        }
    }

    public static function table():Identifier
    {
        return Identifier::{static::class}();
    }

    /**
     * Get only static and DBData vars.
     * 
     * Thanks to https://www.php.net/manual/en/function.get-class-vars.php#109995
     * 
     * @return array
     */
    public static function getProperties()
    {
        $the_class = static::class;
        
        // Check if properties are already cached for this class
        if(isset(static::$properties[$the_class]))
        {
            return static::$properties[$the_class];
        }

        $result = [];
        
        // Make sure setup() is called to initialize properties
        static::setup();
        
        // Use ReflectionClass to get static properties
        $reflection = new ReflectionClass($the_class);
        $properties = $reflection->getStaticProperties();
        
        foreach ($properties as $name => $value)
        {
            // Check if the property is an instance of DB\Column and belongs to this specific class
            try {
                $property = $reflection->getProperty($name);
                // Make sure the property is declared in this class, not inherited
                if ($property->getDeclaringClass()->getName() === $the_class &&
                    $property->isStatic() && 
                    $property->isInitialized($reflection) && 
                    $property->getValue($reflection) instanceof DB\Column)
                {
                    $column = $property->getValue($reflection);
                    $column->setName($name);
                    $column->setTable($the_class);
                    $result[] = $name;
                }
            } catch (Exception $e) {
                // Property might not exist in this class, skip it
                continue;
            }
        }
        
        // Cache properties for this class
        static::$properties[$the_class] = $result;
        return static::$properties[$the_class];
    }

    protected static function handleSchema()
    {
        // Use a class-specific schema handled flag
        $class_schema_handled = static::class . '_schema_handled';
        if(isset($GLOBALS[$class_schema_handled]) && $GLOBALS[$class_schema_handled])
        {
            return;
        }

        $table_name = static::class;
        
        // Make sure setup() is called to initialize properties
        static::setup();
        
        $property_list = static::getProperties();
        $column_list = [];
        $column_defs = [];
        
        foreach ($property_list as $p)
        {
            // Use reflection to get the property value from the correct class
            $reflection = new ReflectionClass(static::class);
            try {
                $property = $reflection->getProperty($p);
                $p_var = $property->getValue($reflection);
                
                $p_type = $p_var->getType();
                $p_def = $p_var->getDefinition();
                $column_list[] = [$p, $p_type, $p_def];
                $column_defs[] = $p_var->getFullDefinition();
            } catch (Exception $e) {
                // Property might not exist, skip it
                continue;
            }
        }

        // Handle the table
        if(!static::$db->tableExists($table_name))
        {
            // Filter out empty column definitions
            $column_defs = array_filter($column_defs, function($def) {
                return !empty(trim($def));
            });
            
            if (!empty($column_defs)) {
                $q = static::$db->getConnection()->addTableQuery($table_name, $column_defs);
                static::$db->query($q);
            }
        }


        // Handle the columns
        foreach ($column_list as $c)
        {
            $column_exists = static::$db->columnExists($table_name, $c[0]);
            if(!$column_exists)
            {
                $q = static::$db->getConnection()->addColumnQuery($table_name, $c[0], $c[1], $c[2]);
                static::$db->query($q);
            }
        }

        // Handle foreign keys
        foreach (static::$foreignKeys as $fk) {
            $column = $fk['column'];
            $referencedTable = $fk['referencedTable'];
            $referencedColumn = $fk['referencedColumn'];
            $onDelete = $fk['onDelete'] ?? 'CASCADE';
            $onUpdate = $fk['onUpdate'] ?? 'CASCADE';
            
            // Check if foreign key already exists
            // For simplicity, we'll just try to add it and ignore errors
            // A more robust implementation would check if the FK already exists
            $q = static::$db->getConnection()->addForeignKeyQuery(
                $table_name, 
                $column, 
                $referencedTable, 
                $referencedColumn, 
                $onDelete, 
                $onUpdate
            );
            
            if ($q) {
                try {
                    static::$db->query($q);
                } catch (Exception $e) {
                    // Foreign key might already exist, ignore error
                }
            }
        }

        $GLOBALS[$class_schema_handled] = true;
    }

    protected static function addForeignKey(string $column, string $referencedTable, string $referencedColumn, string $onDelete = 'CASCADE', string $onUpdate = 'CASCADE')
    {
        static::$foreignKeys[] = [
            'column' => $column,
            'referencedTable' => $referencedTable,
            'referencedColumn' => $referencedColumn,
            'onDelete' => $onDelete,
            'onUpdate' => $onUpdate
        ];
    }
}
