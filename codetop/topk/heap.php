<?php

/**
 * @property int $count
 * @property array $container
 */
class MinHeap {

    public $count;
    public $container;

    public function __construct()
    {
        $this->count = 0;
        $this->container = [0];
    }

    public function insert($item)
    {
        $this->count++;
        $this->container[$this->count] = $item;
        $this->bubbleUp($this->count);
    }

    function bubbleUp($idx) {
        $p = intval($idx/2);
        $cur = $idx;
        while ($cur > 0 && $this->container[$p] > $this->container[$cur]) {
            $this->swap($p, $cur);
            $cur = $p;
            $p = intval($p/2);
        }
    }

    public function extract()
    {
        if ($this->count == 0) return null;

        $min = $this->container[1];

        $this->container[1] = $this->container[$this->count];

        $this->sinkDown(1);
        $this->count--;
        return $min;
    }

    public function sinkDown($k)
    {
//        while (true) {
//
//            $min = $idx;
//            if (2 * $idx <= $this->count && $this->container[$idx] > $this->container[2*$idx]) {
//                $min = 2 * $idx;
//            }
//
//            if ((2 * $idx + 1) <= $this->count && $this->container[$min] > $this->container[2*$idx+1]) {
//                $min = 2 * $idx + 1;
//            }
//
//            if ($min == $idx) break;
//
//            $this->swap($min, $idx);
//            $idx  = $min;
//        }

        $min = $k;

        $l = 2 * $k;
        $r = 2 * $k +1;

        if ($l < $this->count && $this->container[$min]  > $this->container[$l]) {
            $min = $l;
        }

        if ($l < $this->count && $this->container[$min]  > $this->container[$r]) {
            $min = $r;
        }

        if ($min != $k) {
            $this->swap($k, $min);
            $this->sinkDown($min);
        }

    }

    public function swap($i, $j)
    {
        $tmp = $this->container[$i];
        $this->container[$i] = $this->container[$j];
        $this->container[$j] = $tmp;
    }
}
$heap = new MinHeap();
$arr = [3,2,3,1,2,4,5,5,6,7,7,8,2,3,1,1,1,10,11,5,6,2,4,7,8,5,6];
foreach ($arr as $index => $num) {
    $heap->insert($num);
    //  echo "{$heap->count()}, {$num}--->" . json_encode($heap->container) . PHP_EOL;
}


while ($heap->count > 0) {
    echo  "{$heap->count}---->." . json_encode($heap->container) . ", extract:" . $heap->extract() . PHP_EOL;
}


