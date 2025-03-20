<?php

/*
Problem Statement #
Given an array of points in the a 2D2D plane, find ‘K’ closest points to the origin.

Example 1:
Input: points = [[1,2],[1,3]], K = 1
Output: [[1,2]]
Explanation: The Euclidean distance between (1, 2) and the origin is sqrt(5).
The Euclidean distance between (1, 3) and the origin is sqrt(10).
Since sqrt(5) < sqrt(10), therefore (1, 2) is closer to the origin.

Example 2:
Input: point = [[1, 3], [3, 4], [2, -1]], K = 2
Output: [[1, 3], [2, -1]]
 */

class Point {
    public  $x;
    public  $y;

    /**
     * @param $x
     * @param $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function disFromOrigin()
    {
       return ($this->x*$this->x) + ($this->y*$this->y);
    }
}

class MyMaxHeap extends SplMaxHeap {
    public function compare($item1,  $item2):int
    {
        return $item1->disFromOrigin() - $item2->disFromOrigin();
    }
}

$arr = [
    new Point(1,3),
    new Point(3,4),
    new Point(2,-1),
];
$k = 2;


$arr = [
    new Point(1,2),
    new Point(1,3),
];
$k = 1;

var_dump(findClosestPoints($arr, $k));
function  findClosestPoints($arr, $k) {

    $heap = new MyMaxHeap();

    foreach ($arr as $index => $item) {
        if ($heap->count() < $k) {
            $heap->insert($item);
        } else if ($heap->top() > $item) {
            $heap->extract();
            $heap->insert($item);
        }
    }

    $ret = [];
    while ($heap->count() > 0) {
        $ret[] = $heap->extract();
    }

    return $ret;
}