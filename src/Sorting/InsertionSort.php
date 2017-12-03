<?php

namespace Sorting;

class InsertionSort implements Sort
{
    public function sort(array $arr = []): array
    {
        if ($arr == []) {
            return [];
        }

        for ($i = 1; $i < count($arr); $i++) {
            $key = $arr[$i];
            $j = $i - 1;

            while ($j >= 0 && $arr[$j] > $key) {
                $arr[$j + 1] = $arr[$j];
                $j--;
            }
            $arr[$j + 1] = $key;
        }

        return $arr;
    }
}