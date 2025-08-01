<?php

class ViewEscaped extends View
{
    // Mark as escaped, add any extra logic if needed
    public function __construct(mixed $value)
    {
        parent::__construct($value);
        $this->is_escaped = true; // Mark as escaped
    }
}