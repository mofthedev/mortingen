<?php

use DB\Column;

class User extends Model
{
    protected static DB\Column $id;
    protected static DB\Column $username;
    protected static DB\Column $email;
    protected static DB\Column $password_hash;
    protected static DB\Column $created_at;
    protected static DB\Column $updated_at;

    public static function setup()
    {
        static::$id = new Column('INT', 'UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY');
        static::$username = new Column('VARCHAR(50)', 'NOT NULL UNIQUE');
        static::$email = new Column('VARCHAR(100)', 'NOT NULL UNIQUE');
        static::$password_hash = new Column('VARCHAR(255)', 'NOT NULL');
        static::$created_at = new Column('TIMESTAMP', 'DEFAULT CURRENT_TIMESTAMP');
        static::$updated_at = new Column('TIMESTAMP', 'DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
    }
    
    // Initialize properties when class is loaded
    /*public static function init(?DB\DB $db = null)
    {
        if (!isset(static::$id)) {
            static::setup();
        }
        parent::init($db);
    }*/
}