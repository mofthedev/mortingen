<?php

class View
{

    /**
     * @var callable|string|null
     */
    public $escape_function = "defaultEscapeFunction";
        
    public function __construct(protected mixed $value)
    {
    }

    public function __toString()
    {
        return $this->value;
    }

    public function escape()
    {
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

    private function defaultEscapeFunction($value)
    {
        return htmlspecialchars(@strval($value), ENT_COMPAT, 'UTF-8');
    }


}