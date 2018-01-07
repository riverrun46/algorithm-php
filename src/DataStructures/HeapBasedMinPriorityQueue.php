<?php

namespace DataStructures;

class HeapBasedMinPriorityQueue implements MinPriorityQueue
{
    protected $heap;

    public function __construct()
    {
        $this->heap = new MinHeap();
    }

    public function insert($key): void
    {
        $heapSize = $this->heap->getHeapSize();
        $this->heap->setHeapSize($heapSize + 1);

        $this->heap->set($heapSize, $key);
        $this->decreaseKey($heapSize, $key);
    }

    public function minimum(): int
    {
        return $this->heap->get(0);
    }

    /**
     * Extract the minimum.
     */
    public function extract(): int
    {
        $heapSize = $this->heap->getHeapSize();

        if ($this->heap->getHeapSize() < 1) {
            throw new \Exception('heap underflow');
        }

        $min = $this->minimum();
        $this->heap->set(0, $this->heap->get($heapSize - 1));
        $this->heap->setHeapSize($heapSize - 1);
        $this->heap->heapify(0);

        return $min;
    }

    /**
     * Decrease position i's key to k.
     *
     * @param int $i position
     * @param int $key key to be decreased
     * @throws \Exception
     */
    public function decreaseKey(int $i, int $key): void
    {
        if ($key > $this->heap->get($i)) {
            throw new \Exception('new key must be smaller than current key');
        }

        if ($i >= $this->heap->getHeapSize()) {
            throw new \Exception('index out of range');
        }

        // decrease
        $this->heap->set($i, $key);

        // re-heapify
        while ($i > 0 && $this->heap->get($i) < $this->heap->get($parent = $this->heap->parent($i))) {
            $this->heap->exchange($i, $parent);
            $i = $parent;
        }
    }
}