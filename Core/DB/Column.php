<?php

namespace DB;

class Column
{
    private string $name = '';
    private string $table = '';
    private ?Identifier $identifier = null;

    public function __construct(
        private string $type,      // e.g. 'BIGINT', 'VARCHAR(255)', 'TEXT'
        private string $definition = '' // e.g. 'UNSIGNED NOT NULL AUTO_INCREMENT', or any extra SQL
    )
    {

    }

    public function setName(string $name)
    {
        $this->name = $name;
        // Update the identifier if it exists
        if (!empty($this->table)) {
            $this->identifier = Identifier::{$this->table . '.' . $name}();
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setTable(string $table)
    {
        $this->table = $table;
        // Create or update the identifier
        if (!empty($this->name)) {
            $this->identifier = Identifier::{$table . '.' . $this->name}();
        }
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getDefinition(): string
    {
        return $this->definition;
    }

    /**
     * returns "{type} {definition}"
     */
    public function getFullDefinition(): string
    {
        if (empty($this->name)) {
            return '';
        }
        return trim($this->name . ' ' . $this->type . ' ' . $this->definition);
    }

    public function __toString(): string
    {
        if (!$this->identifier && !empty($this->table) && !empty($this->name)) {
            $this->identifier = Identifier::{$this->table . '.' . $this->name}();
        }
        return $this->identifier ? (string) $this->identifier : '';
    }
}
