<?php

namespace DataStructures;

class MaxHeap
{
    private $container = [];

    private $heapSize = 0;

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

    public function getHeapSize()
    {
        return $this->heapSize;
    }

    public function setHeapSize($size)
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

    public function heapify(int $i): void
    {
        $l = $this->left($i);
        $r = $this->right($i);

        // find out the largest
        if ($l < $this->getHeapSize() && $this->get($l) > $this->get($i)) {
            $largest = $l;
        } else {
            $largest = $i;
        }
        if ($r < $this->getHeapSize() && $this->get($r) > $this->get($largest)) {
            $largest = $r;
        }

        // exchange
        if ($largest != $i) {
            $temp = $this->get($i);
            $this->set($i, $this->get($largest));
            $this->set($largest, $temp);

            // max-heapify recursively
            $this->heapify($largest);
        }
    }

    private function parent(int $i): int
    {
        return (int) floor(($i - 1) / 2);
    }

    private function left(int $i): int
    {
        return ($i + 1) * 2 - 1;
    }

    private function right(int $i): int
    {
        return ($i + 1) * 2;
    }
}