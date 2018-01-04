<?php

namespace Sorting;

use DataStructures\MaxHeap;

class HeapSort implements Sort
{
    public function sort(array $arr = []): array
    {
        $length = count($arr);
        if ($length <= 0) {
            return [];
        }

        $heap = new MaxHeap($arr);
        for ($i = $length - 1; $i >= 1; $i--) {
            // exchange
            $temp = $heap->get(0);
            $heap->set(0, $heap->get($i));
            $heap->set($i, $temp);

            // re-heapify
            $heap->setHeapSize($heap->getHeapSize() - 1);
            $heap->heapify(0);

        }

        return $heap->get();
    }
}