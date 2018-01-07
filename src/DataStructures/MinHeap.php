<?php

namespace DataStructures;

class MinHeap extends Heap
{
    public function heapify(int $i): void
    {
        $l = $this->left($i);
        $r = $this->right($i);

        // find out the smallest
        if ($l < $this->getHeapSize() && $this->get($l) < $this->get($i)) {
            $smallest = $l;
        } else {
            $smallest = $i;
        }
        if ($r < $this->getHeapSize() && $this->get($r) < $this->get($smallest)) {
            $smallest = $r;
        }

        // exchange
        if ($smallest != $i) {
            $this->exchange($i, $smallest);

            // min-heapify recursively
            $this->heapify($smallest);
        }
    }
}