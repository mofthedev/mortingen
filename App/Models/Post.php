<?php

use DB\Column;

class Post extends Model
{
    protected static DB\Column $id;
    protected static DB\Column $user_id;
    protected static DB\Column $title;
    protected static DB\Column $content;
    protected static DB\Column $created_at;
    protected static DB\Column $updated_at;

    public static function setup()
    {
        static::$id = new Column('INT', 'UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY');
        static::$user_id = new Column('INT', 'UNSIGNED NOT NULL');
        static::$title = new Column('VARCHAR(255)', 'NOT NULL');
        static::$content = new Column('TEXT');
        static::$created_at = new Column('TIMESTAMP', 'DEFAULT CURRENT_TIMESTAMP');
        static::$updated_at = new Column('TIMESTAMP', 'DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP');
        
        // Add foreign key constraint
        static::addForeignKey('user_id', 'User', 'id');
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