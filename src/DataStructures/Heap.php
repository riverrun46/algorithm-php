<?php

namespace DataStructures;

abstract class Heap
{

    protected $container = [];
    protected $heapSize = 0;

    public function __construct(array $arr = [])
    {
        if (count($arr) <= 0) {
            return;
        }

        $this->build($arr);
    }

    public function get()
    {
        if (func_num_args() == 1) {
            return $this->container[func_get_arg(0)];
        }

        return $this->container;
    }

    public function set()
    {
        $args = func_get_args();

        if (count($args) == 1 && gettype($args[0]) == 'array') {
            $this->container = $args[0];
        } elseif (count($args) == 2 && gettype($args[0]) == 'integer') {
            $this->container[$args[0]] = $args[1];
        }
    }

    public function getHeapSize(): int
    {
        return $this->heapSize;
    }

    public function setHeapSize(int $size): void
    {
        $this->heapSize = $size;
    }

    public function build(array $arr): void
    {
        $this->set($arr);
        $this->setHeapSize(count($arr));

        for ($i = $this->getHeapSize() - 1; $i >= 0; $i--) {
            $this->heapify($i);
        }
    }

    abstract public function heapify(int $i): void;

    public function parent(int $i): int
    {
        return (int) floor(($i - 1) / 2);
    }

    public function left(int $i): int
    {
        return ($i + 1) * 2 - 1;
    }

    public function right(int $i): int
    {
        return ($i + 1) * 2;
    }

    public function exchange(int $i, int $j): void
    {
        $temp = $this->get($i);
        $this->set($i, $this->get($j));
        $this->set($j, $temp);
    }
}