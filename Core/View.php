<?php

class View
{

    /**
     * @var callable|string
     */
    private $escape_function = "defaultEscapeFunction";
    protected bool $is_escaped = false;

    public function __construct(protected mixed $value)
    {
    }

    public function __toString()
    {
        $this->escape();
        return $this->value;
    }

    protected function escape()
    {
        if ($this->is_escaped)
        {
            return $this; // Already escaped, return the object
        }
        $this->is_escaped = true; // Mark as escaped

        if ($this->value instanceof View)
        {
            return $this; // Return the value without escaping
        }
        else
        {
            if (is_callable($this->escape_function))
            {
                $this->value = ($this->escape_function)($this->value);
            }
            elseif (is_string($this->escape_function))
            {
                $this->value = $this->{($this->escape_function)}($this->value);
            }
            else
            {
                throw new Exception("No properly defined escape function! Couldn't escape!");
            }
            return $this;
        }
    }

    public function setEscapeFunction(callable|string $escape_function)
    {
        $this->escape_function = $escape_function;
        return $this;
    }

    protected function defaultEscapeFunction($value)
    {
        // return htmlspecialchars(@strval($value), ENT_COMPAT, 'UTF-8');
        return htmlspecialchars(@strval($value), encoding: 'UTF-8');
    }


}