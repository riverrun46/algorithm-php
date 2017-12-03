<?php

namespace Sorting;

class QuickSort implements Sort
{
    public function sort(array $arr): array
    {
        return $this->quickSort($arr, 0, count($arr) - 1);
    }

    private function quickSort(&$arr, $start, $end)
    {
        if ($start >= $end) {
            return;
        }

        $middle = $this->partition($arr, $start, $end);

        $this->quickSort($arr, $start, $middle - 1);
        $this->quickSort($arr, $middle + 1, $end);
    }

    private function partition(&$arr, $start, $end)
    {
        $pivot = $arr[$end];

        $split = $start;
        for ($i = $start; $i < $end; $i++) {
            if ($arr[$i] <= $pivot) {
                $temp = $arr[$split];
                $arr[$split] = $arr[$i];
                $arr[$i] = $temp;
                $split++;
            }
        }

        $arr[$end] = $arr[$split];
        $arr[$split] = $pivot;

        return $split;
    }
}