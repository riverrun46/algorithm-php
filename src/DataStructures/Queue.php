<?php

namespace DataStructures;

class Queue
{
    protected $container = [];

    protected $head = 0;
    protected $tail = 0;
    protected $length = 0;

    public function enqueue($x)
    {
        $this->container[$this->tail] = $x;

        $this->tail = $this->tail == $this->length ? 0 : $this->tail + 1;
    }

    public function dequeue()
    {
        $x = $this->container[$this->head];

        $this->head = $this->head == $this->length ? 0 : $this->head + 1;

        return $x;
    }
}