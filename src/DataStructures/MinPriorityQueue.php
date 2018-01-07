<?php

namespace DataStructures;

interface MinPriorityQueue
{
    public function insert($key): void;

    public function minimum(): int;

    public function extract(): int;

    public function decreaseKey(int $i, int $key): void;
}