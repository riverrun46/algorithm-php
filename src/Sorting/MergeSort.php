<?php

namespace Sorting;

class MergeSort implements Sort
{
    public function sort(array $arr): array
    {
        return $this->mergeSort($arr, 0, count($arr) - 1);
    }

    private function mergeSort(&$arr, $start, $end)
    {
        if ($start >= $end) {
            return;
        }

        $middle = (int) floor(($start + $end) / 2);

        $this->mergeSort($arr, $start, $middle);
        $this->mergeSort($arr, $middle + 1, $end);

        $this->merge($arr, $start, $middle, $end);
    }

    private function merge(&$arr, $start, $middle, $end)
    {
        $leftLength = $middle - $start + 1;
        $rightLength = $end - $middle;
        $leftArr = [];
        $rightArr = [];

        for ($i = 0; $i < $leftLength; $i++) {
            array_push($leftArr, $arr[$start + $i]);
        }
        for ($j = 0; $j < $rightLength; $j++) {
            array_push($rightArr, $arr[$middle + $j + 1]);
        }

        $i = 0;
        $j = 0;
        for ($k = $start; $k <= $end; $k++) {
            if ($leftArr[$i] <= $rightArr[$j]) {
                $arr[$k] = $leftArr[$i];
                if (++$i >= $leftLength) {
                    for ($offset = 0; $offset < $rightLength - $j; $offset++) {
                        $arr[$k + 1 + $offset] = $rightArr[$j + $offset];
                    }
                    break;
                }

            } else {
                $arr[$k] = $rightArr[$j];
                if (++$j >= $rightLength) {
                    for ($offset = 0; $offset < $leftLength - $i; $offset++) {
                        $arr[$k + 1 + $offset] = $leftArr[$i + $offset];
                    }
                    break;
                }
            }
        }
    }
}