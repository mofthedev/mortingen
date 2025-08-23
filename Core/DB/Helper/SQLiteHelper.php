<?php

namespace DB\Helper;

class SQLiteHelper extends BaseHelper
{
    public function __construct(public string $path)
    {
    }

    public function __toString(): string
    {
        return "sqlite:{$this->path}";
    }

    public function tableExistsQuery(): string
    {
        return "SELECT 1 FROM sqlite_master WHERE type='table' AND name = :table";
    }

    public function columnExistsQuery(): string
    {
        // SQLite does not support parameterized PRAGMA queries, so return empty string or null
        return '';
    }

    public function addColumnQuery(string $table, string $column, string $type, string $definitions = ''): string
    {
        return "ALTER TABLE \"{$table}\" ADD COLUMN \"{$column}\" {$type} {$definitions}";
    }

    public function addTableQuery(string $table, array $columns, ?string $tableModifiers = null): string
    {
        $mod = $tableModifiers ?? static::$defaultTableModifiers;
        $mod = $mod ? " " . trim($mod) : "";
        $cols = implode(",\n    ", $columns);
        return "CREATE TABLE \"{$table}\" (\n    {$cols}\n){$mod};";
    }
}
