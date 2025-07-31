<?php

namespace DBTypes;

class DBTypes
{
    public static function init(){}
}

class DBData
{
    protected ?string $tableName = null;
    protected ?string $columnName = null;
    protected string $type = 'varchar(128)';
    protected string $definition = '';
    // protected mixed $value = null;
    protected bool $fillable = true;

    public function __construct(... $arguments)
    {
        if(count($arguments)>0)
        {
            $sql_args = ''.implode(',', $arguments);

            $start_pos = strpos($this->type, '(');
            $end_pos = strpos($this->type, ')');

            if ($start_pos !== false && $end_pos !== false && $end_pos > $start_pos)
            {
                $before = substr($this->type, 0, $start_pos + 1);
                $after = substr($this->type, $end_pos);
                $this->type = $before . $sql_args . $after;
            }
            else
            {
                $this->type .= '('.$sql_args.')';
            }
        }
    }

    public function getTableName() : string
    {
        return $this->tableName;
    }

    public function setTableName(string $newName)
    {
        $this->tableName = $newName;
    }

    public function getColumnName() : string
    {
        return $this->columnName;
    }

    public function setColumnName(string $newName)
    {
        $this->columnName = $newName;
    }

    public function getFullPropertyName() : string
    {
        return $this->getTableName()."::".$this->getColumnName();
    }

    public function getFullColumnName() : string
    {
        return $this->getTableName().".".$this->getColumnName();
    }

    public function sanitize($value)
    {
        return $this->filter($value);
    }

    // public function getValue() : mixed
    // {
    //     if (is_null($this->value))
    //     {
    //         return null;
    //     }
    //     return $this->filter($this->value);
    // }

    // public function setValue(mixed $newValue)
    // {
    //     // if(!$this->fillable)
    //     // {
    //     //     throw new \Exception('Cannot set the value of a non-fillable property!');
    //     // }
    //     $this->value = $this->filter($newValue);
    // }
    
    public function filter($v)
    {
        return $v;
    }

    // public function __toString()
    // {
    //     return strval($this->getValue());
    // }
    
    public function __toString()
    {
        return strval($this->getColumnName());
    }

    public function getType()
    {
        return $this->type;
    }

    public function getDefinition()
    {
        return $this->definition;
    }

    public function setFillable(bool $fillability)
    {
        $this->fillable = $fillability;
    }

    public function isFillable()
    {
        return $this->fillable;
    }
}

//Categories for DB data types
class Numerical extends DBData
{
    protected string $type = 'float';
    public function filter($v)
    {
        return floatval($v);
    }
}

class Textual extends DBData
{
    protected string $type = 'varchar(128)';//This equals to TINYTEXT but whatever...
    public function filter($v)
    {
        return strval($v);
    }
}

class Temporal extends DBData
{
    protected string $type = 'varchar(32)';
    public function filter($v)
    {
        return strval($v);
    }
}

// Integers
class _INT extends Numerical
{
    protected string $type = 'int(11)';
    public function filter($v)
    {
        return intval($v);
    }
}
class _BIT extends _INT
{
    protected string $type = 'bit(1)';
}
class _BOOL extends _INT
{
    protected string $type = 'tinyint(1)';
}
class _BOOLEAN extends _INT
{
    protected string $type = 'tinyint(1)';
}
class _TINYINT extends _INT
{
    protected string $type = 'tinyint(4)';
}
class _SMALLINT extends _INT
{
    protected string $type = 'smallint(6)';
}
class _MEDIUMINT extends _INT
{
    protected string $type = 'mediumint(9)';
}
// class _INTEGER extends _INT
// {
//     protected string $type = 'int(11)';
// }
class _BIGINT extends _INT
{
    protected string $type = 'bigint(20)';
}

// Unsigned Integers
class _INT_UNSIGNED extends _INT
{
    protected string $type = 'int(11) unsigned';
    public function filter($v)
    {
        return max(0, intval($v));
    }
}
class _TINYINT_UNSIGNED extends _INT_UNSIGNED
{
    protected string $type = 'tinyint(4) unsigned';
}
class _SMALLINT_UNSIGNED extends _INT_UNSIGNED
{
    protected string $type = 'smallint(6) unsigned';
}
class _MEDIUMINT_UNSIGNED extends _INT_UNSIGNED
{
    protected string $type = 'mediumint(9) unsigned';
}
// class _INTEGER_UNSIGNED extends _INT_UNSIGNED
// {
//     protected string $type = 'int(11) unsigned';
// }
class _BIGINT_UNSIGNED extends _INT_UNSIGNED
{
    protected string $type = 'bigint(20) unsigned';
}

// Speacial case for primary keys: ID
class _ID extends _BIGINT_UNSIGNED
{
    protected string $definition = 'NOT NULL AUTO_INCREMENT PRIMARY KEY';
    protected bool $fillable = false;
}

// Speacial case for weak references (like foreign keys), nullable
class _REFID extends _BIGINT_UNSIGNED
{
    
}

// Decimals
class _DOUBLE extends Numerical
{
    protected string $type = 'double';
}
// class _DOUBLE_PRECISION extends _DOUBLE
// {
//     protected string $type = 'DOUBLE';
// }
class _FLOAT extends _DOUBLE
{
    protected string $type = 'float';
}
class _DECIMAL extends Numerical
{
    protected string $type = 'decimal';
    public function filter($v)
    {
        return strval(\Brick\Math\BigDecimal::of($v));
    }
}
// class _DEC extends _DECIMAL
// {
//     protected string $type = 'decimal';
// }

// Strings
class _CHAR extends Textual
{
    protected string $type = 'char(32)';
}
class _VARCHAR extends Textual
{
    protected string $type = 'varchar(32)';
}
class _BINARY extends Textual
{
    protected string $type = 'binary(1)';
}
class _VARBINARY extends Textual
{
    protected string $type = 'varbinary(1)';
}
class _TINYBLOB extends Textual
{
    protected string $type = 'tinyblob';
}
class _TINYTEXT extends Textual
{
    protected string $type = 'tinytext';
}
class _TEXT extends Textual
{
    protected string $type = 'text';
}
class _BLOB extends Textual
{
    protected string $type = 'blob';
}
class _MEDIUMTEXT extends Textual
{
    protected string $type = 'mediumtext';
}
class _MEDIUMBLOB extends Textual
{
    protected string $type = 'mediumblob';
}
class _LONGTEXT extends Textual
{
    protected string $type = 'longtext';
}
class _LONGBLOB extends Textual
{
    protected string $type = 'longblob';
}
class _ENUM extends Textual
{
    protected string $type = 'enum';
}
class _SET extends Textual
{
    protected string $type = 'set';
}

// Dates & Times
class _DATE extends Temporal
{
    protected string $type = 'date';
}
class _DATETIME extends Temporal
{
    protected string $type = 'datetime';
}
class _TIMESTAMP extends Temporal
{
    protected string $type = 'timestamp';
}
class _TIME extends Temporal
{
    protected string $type = 'time';
}
class _YEAR extends Temporal
{
    protected string $type = 'year(4)';
}

