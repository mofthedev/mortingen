<?php

/**
 * Author: Möf Selvi
 * SQLFESQ: SQL with Fast, Easy and Safe Queries
 * Licensed under MIT.
 * 
 * @package     MofSelvi\SQLFESQ
 * @author      Möf Selvi (@mofthedev)
 * @copyright   Möf Selvi (Muhammed Ömer Faruk Selvi, mofselvi)
 * @license     http://opensource.org/licenses/MIT MIT License
 */

namespace MofSelvi\SQLFESQ;

class SQLFESQ
{
    /** Constants for DB types. Faster, safer, and easier than string comparisons. */
    const TYPE_UNKNOWN = 0;
    const TYPE_MYSQL = 1;
    const TYPE_SQLITE = 2;


    /** All SQL variables are public, so anything that is a part of the SQL engine is accessable. */
    public $db;
    public $db_type;
    public $db_name;
    public $errno = 0;
    public $error = '';
    public $stmt;
    public $insertID;
    public $numOfRows=0;
    public $affectedRows=0;
    public $lastQuery="";
    public $lastValues=[];
    public $fetchType = MYSQLI_ASSOC; //MYSQLI_ASSOC,MYSQLI_NUM,MYSQLI_BOTH
    public $transactionStarted = false;

    /**
     * First instantiated object of this class.
     * 
     * @static SQLFESQ
     */
    private static $instance;

    /**
     * Last instantiated object of this class.
     * 
     * @static SQLFESQ
     */
    private static $lastInstance;


    public function __construct($connection=NULL)
    {
        if(is_null($connection))
        {
            return;
        }
        $this->db = $connection;

        // @Attention: For each DB type
        if($connection instanceof \mysqli)
        {
            $this->db_type = static::TYPE_MYSQL;
            $this->fetchType = MYSQLI_ASSOC;
        }
        elseif($connection instanceof \SQLite3)
        {
            $this->db_type = static::TYPE_SQLITE;
            $this->fetchType = SQLITE3_ASSOC;
        }
        else
        {
            $this->errno = 3;
            $this->error = "This DB type is not supported yet. Please, consider contributing to the library.";
            $this->db_type = static::TYPE_UNKNOWN;
            $this->db = NULL;
        }
    }
 
    public function connectMysql($hostname=NULL, $username=NULL, $password=NULL, $database=NULL)
    {
        if(is_null($hostname ?? $username ?? $password ?? $database))
        {
            $this->errno = 1;
            $this->error = "No connection. This object still can be used for test purposes.";
            return false;
        }
        
        try
        {
            $this->db = new \mysqli($hostname, $username, $password, $database);
            if ($this->db->connect_errno)
            {
                $this->errno = $this->db->connect_errno;
                $this->error = $this->db->connect_error;
                return false;
            }
            else
            {
                self::$instance = self::$instance ?? $this;
                self::$lastInstance = $this;
            }
            // $this->query("SET character_set_results=utf8;");
            $this->query("SET NAMES 'utf8mb4';");

            $this->db_type = static::TYPE_MYSQL;
            $this->fetchType = MYSQLI_ASSOC;
            $this->db_name = $database;
            return true;
        }
        catch (\mysqli_sql_exception $e)
        {
            $this->errno = $this->errno!==0 ? $this->errno : 1;
            $this->error .= " ## ".$e;
            return false;
        }
        catch(\Exception $e)
        {
            $this->errno = $this->errno!==0 ? $this->errno : 1;
            $this->error .= " ## ".$e;
            return false;
        }
    }

    public function connectSqlite($dbfilepath)
    {
        if(is_null($dbfilepath))
        {
            $this->errno = 1;
            $this->error = "No connection. This object still can be used for test purposes.";
            return false;
        }
        
        try
        {
            $this->db = new \SQLite3($dbfilepath);
            if ($this->db->lastErrorCode())
            {
                $this->errno = $this->db->lastErrorCode();
                $this->error = $this->db->lastErrorMsg();
                return false;
            }
            else
            {
                self::$instance = self::$instance ?? $this;
                self::$lastInstance = $this;
            }
            $this->db->busyTimeout(60000);//60000
            
            $this->db_type = static::TYPE_SQLITE;
            $this->fetchType = SQLITE3_ASSOC;
            return true;
        }
        catch(\Exception $e)
        {
            $this->errno = $this->errno!==0 ? $this->errno : 1;
            $this->error .= " ## ".$e;
            return false;
        }
    }

    /**
     * Get the first instance.
     * 
     * @static
     * @return SQLFESQ
     */
    public static function getInstance()
    {
        return self::$instance;
    }

    /**
     * Get the last initialized instance.
     * 
     * @static
     * @return SQLFESQ
     */
    public static function getLastInstance()
    {
        return self::$lastInstance;
    }

    // INFORMATION_SCHEMA queries

    public static function getDatabases()
    {
        return self::getInstance()->query("SELECT * FROM INFORMATION_SCHEMA.`SCHEMATA`;");
    }

    public static function getTables($db_name=null)
    {
        if(is_null($db_name) || empty($db_name))
        {
            $db_name = self::getInstance()->db_name;
        }
        return self::getInstance()->query("SELECT TABLE_NAME, TABLE_COLLATION FROM INFORMATION_SCHEMA.`TABLES` WHERE",['table_schema=' => $db_name]," ;");
    }

    public static function getColumns($table_name, $db_name=null)
    {
        if(is_null($db_name) || empty($db_name))
        {
            $db_name = self::getInstance()->db_name;
        }
        return self::getInstance()->query("SELECT COLUMN_NAME, DATA_TYPE, COLUMN_DEFAULT, IS_NULLABLE, CHARACTER_MAXIMUM_LENGTH, CHARACTER_SET_NAME, COLLATION_NAME, COLUMN_TYPE, EXTRA FROM INFORMATION_SCHEMA.`COLUMNS` WHERE",['AND'=>['table_name='=>$table_name, 'table_schema=' => $db_name]]," ;");
    }

    public static function findTable($table_name, $db_name=null)
    {
        $table_list = self::getTables($db_name);
        foreach ($table_list as $t)
        {
            if( mb_strtolower($t['TABLE_NAME'])===mb_strtolower($table_name))
            {
                return $t;
            }
        }
        return false;
    }

    public static function findColumn($column_name, $table_name, $db_name=null)
    {
        $column_list = self::getColumns($table_name, $db_name);
        foreach ($column_list as $c)
        {
            if(mb_strtolower($c['COLUMN_NAME'])===mb_strtolower($column_name))
            {
                return $c;
            }
        }
        return false;
    }

    // Object Methods

    function checkConnection()
    {
        if(is_null($this->db))
        {
            $this->errno = 1;
            $this->error = "No connection.";
            return false;
        }
        return true;
    }

    function handleError()
    {
        if(is_null($this->db))
        {
            $this->checkConnection();
            return false;
        }

        // @Attention: For each DB type
        // Get the error number and error message, if any.
        if ($this->db_type===static::TYPE_MYSQL && property_exists($this->db,'errno'))
        {
            $this->errno = $this->db->errno;
            $this->error = $this->db->error;
        }
        elseif ($this->db_type===static::TYPE_SQLITE && method_exists($this->db,'lastErrorCode'))
        {
            $this->errno = $this->db->lastErrorCode();
            $this->error = $this->db->lastErrorMsg();
        }
        else
        {
            $this->errno = 0;
            $this->error = "";
        }
    }

    public function __call($name, $arguments)
    {
        if(!is_null($this->db) && method_exists($this->db,$name))
        {
            return $this->db->$name($arguments);
        }
        $this->errno = 2;
        $this->error = "No such a function. Nothing will happen.";
        return false;
    }

    /**
     * Starts a transaction, if not done before. Then processes the query.
     * To apply all queries in the queue, use flush().
     * @param array $q
     * @return mixed
     */
    public function queue(...$q)
    {
        if(is_null($this->db))
        {
            $this->checkConnection();
            return false;
        }

        $starting_transaction = false;

        // Start a transaction if not done before
        if($this->transactionStarted === false)
        {
            $this->transactionStarted = true;

            // @Attention: For each DB type
            if($this->db_type===static::TYPE_MYSQL)
            {
                $starting_transaction = $this->db->query("START TRANSACTION;");
            }
            elseif($this->db_type===static::TYPE_SQLITE)
            {
                $starting_transaction = $this->db->exec("BEGIN;");
            }

            if(!$starting_transaction)
            {
                return false;
            }
        }

        return $this->query(...$q);
    }

    /**
     * Commits the transaction and applies all changes in the queue.
     * Transaction ends here.
     * @return \SQLite3Result|\mysqli_result|bool
     */
    public function flush()
    {
        if(is_null($this->db))
        {
            $this->checkConnection();
            return false;
        }

        $ending_transaction = false;

        if($this->transactionStarted === true)
        {
            $this->transactionStarted = false;

            // @Attention: For each DB type
            if($this->db_type===static::TYPE_MYSQL)
            {
                $ending_transaction = $this->db->query("COMMIT;");
            }
            elseif($this->db_type===static::TYPE_SQLITE)
            {
                $ending_transaction = $this->db->exec("COMMIT;");
            }
        }

        return $ending_transaction;
    }

    /**
     * Processes a query and sends it to the DB.
     * Can be used for simple string queries and prepared queries. See the examples.
     * @param array $q
     * @return mixed
     */
    public function query(...$q)
    {
        if(is_null($this->db))
        {
            $this->checkConnection();
            return false;
        }

        $qv = $this->processQuery(...$q);
        // print_r($qv);
        $query = $qv['query'];
        $values = $qv['values'];

        $this->lastQuery = $query;
        $this->lastValues = $values;

        $values_len = count($values);

        try
        {
            // $this->db->autocommit(false);

            $this->stmt = $this->db->prepare($query);

            if(!$this->stmt)
            {
                $this->handleError();
                return false;
            }

            if($values_len > 0)
            {
                // @Attention: For each DB type
                if($this->db_type===static::TYPE_MYSQL)
                {
                    $bind_types = str_repeat('s', $values_len);
                    $binding_params = $this->stmt->bind_param($bind_types, ...$values);
                    
                    if(!$binding_params)
                    {
                        $this->handleError();
                        return false;
                    }
                }
                elseif($this->db_type===static::TYPE_SQLITE)
                {
                    foreach ($values as $idx => $val)
                    {
                        $binding_params = $this->stmt->bindValue($idx+1, $val, SQLITE3_TEXT);

                        if(!$binding_params)
                        {
                            $this->handleError();
                            return false;
                        }
                    }
                }
            }
            
            $execute_result = $this->stmt->execute();

            if($this->db_type===static::TYPE_SQLITE)
            {
                $this->stmt->reset();
            }

            if(!$execute_result)
            {
                $this->handleError();
                return false;
            }

            // @Attention: For each DB type
            // Get number of affected rows
            if($this->db_type===static::TYPE_MYSQL)
            {
                $this->affectedRows = $this->db->affected_rows;
            }
            elseif($this->db_type===static::TYPE_SQLITE)
            {
                $this->affectedRows = $this->db->changes();
            }


            $rows = [];
            $this->numOfRows = 0;

            // There is a known bug in Sqlite.
            // After using a prepared statement, calling fetchArray() method will execute the query again.
            // This will fix it.
            $query_uc = strtoupper($query);
            if(strpos($query_uc, "SELECT") !== false && strpos($query_uc, "INSERT INTO") === false)
            {
                if($this->db_type===static::TYPE_MYSQL)
                {
                    $result = $this->stmt->get_result();
                    if($result)
                    {
                        $this->numOfRows = $result->num_rows;
                        $rows = $result->fetch_all($this->fetchType);//MYSQLI_ASSOC,MYSQLI_NUM,MYSQLI_BOTH
                    }
                }
                elseif($this->db_type===static::TYPE_SQLITE)
                {
                    while ($row = $execute_result->fetchArray($this->fetchType))
                    {
                        $rows[] = $row;
                    }
                    $this->numOfRows = count($rows);
                }
            }


            // @Attention: For each DB type
            // Get last insert ID
            if($this->db_type===static::TYPE_MYSQL)
            {
                $this->insertID = $this->db->insert_id;
            }
            elseif($this->db_type===static::TYPE_SQLITE)
            {
                $this->insertID = $this->db->lastInsertRowID();
            }
            

            $this->handleError();

            return $rows;
        }
        catch(\Exception $e)
        {
            $this->errno = $this->errno!==0 ? $this->errno : 4;
            $this->error .= " ## query() error: ".$e;
            return false;
        }
    }

    /**
     * Caution: This method doesn't provide security at all.
     * Use this for queries without user inputs!
     */
    public function multiQuery($query)
    {
        if(is_null($this->db))
        {
            $this->checkConnection();
            return false;
        }
        
        try
        {
            // @Attention: For each DB type
            if($this->db_type===static::TYPE_MYSQL)
            {
                return $this->db->multi_query($query);
            }
            elseif($this->db_type===static::TYPE_SQLITE)
            {
                return $this->db->exec($query);
            }
        }
        catch(\Exception $e)
        {
            $this->errno = $this->errno!==0 ? $this->errno : 5;
            $this->error .= " ## multiQuery() error: ".$e;
            return false;
        }
    }
    

    /**
     * Used while processing a query.
     * @param array $arr
     * @return bool
     */
    protected function arrayHasNoKeys(array $arr)
    {
        if (!function_exists('array_is_list'))
        {
            if ($arr === []) {
                return true;
            }
            return array_keys($arr) === range(0, count($arr) - 1);
        }
        else
        {
            return array_is_list($arr);
        }
    }


    /**
     * Processes a query string but doesn't send the query to the DB.
     * Can be used for debug purposes. No need for an initialized DB connection.
     * @param array $params
     * @return array
     */
    public function processQuery(...$params)
    {
        $query = '';
        $values = array();

        $last_param = '';
        foreach ($params as $param)
        {
            if (is_string($param))
            {
                $query .= $param . ' ';
            }
            elseif(is_array($param) && $this->arrayHasNoKeys($param))
            {
                $param_len = count($param);
                if($param_len > 0)
                {
                    $prepared_params = array_fill(0, $param_len, '?');
                    if(is_array($last_param))
                    {
                        $query .= ',';
                    }
                    $query .= '('.implode(', ',$prepared_params).') ';
                    $values = array_merge($values, $param);
                }
            }
            elseif (is_array($param))
            {
                $nestedQuery = $this->processNestedLogic($param);
                $query .= $nestedQuery['query'] . ' ';
                $values = array_merge($values, $nestedQuery['values']);
            }
            $last_param = $param;
        }

        $query = rtrim($query, ' ');
        if(substr($query,-1)!==";")
        {
            $query .= ';';
        }

        return array('query' => $query, 'values' => $values);
    }

    /**
     * Used by processQuery() to process nested logic arrays.
     * @param mixed $arr
     * @param mixed $op
     * @return array
     */
    protected function processNestedLogic($arr, $op=',')
    {
        $query = '';
        $values = array();

        // $prm_keys = array_keys($arr);
        $i = 0;
        $len = count($arr);
        foreach ($arr as $prm_key => $prm_val)
        {
            if (is_array($prm_val))
            {
                $nestedQuery = $this->processNestedLogic($prm_val, $prm_key);
                if ($len!==1){$query .= '(';}
                $query .= $nestedQuery['query'];
                if ($len!==1){$query .= ')';}
                if ($i!==($len-1))
                {
                    $query .= " ".$op." ";
                }
                $values = array_merge($values, $nestedQuery['values']);
            }
            else
            {
                if(is_int($prm_key))
                {
                    $query .= " ?";
                }
                else
                {
                    $query .= $prm_key." ?";
                }
                
                if ($i!==($len-1))
                {
                    $query .= " ".$op." ";
                }
                $values[] = $prm_val;
            }
            $i++;
        }

        return array('query' => $query, 'values' => $values);
    }
}
