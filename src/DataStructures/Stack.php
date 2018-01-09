<?php

namespace DataStructures;

class Stack
{
    protected $container = [];

    public function __construct(array $arr)
    {
        $this->container = $arr;
    }

    public function push($x)
    {
        array_push($this->container, $x);
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            throw new \Exception('stack underflow');
        }

        return array_pop($this->container);
    }

    public function isEmpty()
    {
        return count($this->container) == 0;
    }
}