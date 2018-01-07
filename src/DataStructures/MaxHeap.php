<?php

namespace DataStructures;

class MaxHeap extends Heap
{
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
            $this->exchange($i, $largest);

            // max-heapify recursively
            $this->heapify($largest);
        }
    }
}