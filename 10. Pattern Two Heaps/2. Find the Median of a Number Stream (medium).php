<?php
/*
Problem Statement #
Design a class to calculate the median of a number stream. The class should have the following two methods:

insertNum(int num): stores the number in the class
findMedian(): returns the median of all numbers inserted in the class
If the count of numbers inserted in the class is even, the median will be the average of the middle two numbers.

Example 1:

1. insertNum(3)
2. insertNum(1)
3. findMedian() -> output: 2
4. insertNum(5)
5. findMedian() -> output: 3
6. insertNum(4)
7. findMedian() -> output: 3.5

[1,6,4,2,8,7] 0,6, 6/2 = 3

//minheap ->
// 1, 2,4

[1,2,] [4,6,8]
 */

// leetcode 295
$c  = new CalculateMedian();

$arr = [1,6,4,2,8,7];
//$arr = [-1,-2,-3];
//[1,2,4,] 6 [7,8,10]
$c  = new CalculateMedianV1();
foreach ($arr as $item) {
    $c->insert($item);
    echo $c->findMedian(). PHP_EOL;
}
//echo $c->findMedian();


class CalculateMedianV1 {

    public $maxHeap;
    public $minHeap;

    public function __construct()
    {
        $this->maxHeap = new SplMaxHeap();
        $this->minHeap  = new SplMinHeap();
    }

    public function insert($num)
    {
        if ($this->maxHeap->isEmpty() || $num <= $this->maxHeap->top()) {
            $this->maxHeap->insert($num);
        } else {
            $this->minHeap->insert($num);
        }

        if ($this->maxHeap->count() > $this->minHeap->count()+1) {
            $this->minHeap->insert($this->maxHeap->extract());
        } else if ($this->minHeap->count() > $this->maxHeap->count()) {
            $this->maxHeap->insert($this->minHeap->extract());
        }
    }

    public function findMedian()
    {
        if ($this->minHeap->count() == $this->maxHeap->count()) {
            return  round(($this->minHeap->top() + $this->maxHeap->top())/2, 2);
        }

        return $this->maxHeap->top();
    }
}



class CalculateMedian {
    public $minHeap;
    public $maxHeap;

    public  $count;

    public function __construct()
    {
        $this->minHeap =  new SplMinHeap();
        $this->maxHeap = new SplMaxHeap();
    }

    //-3,-2,-1
    //-1,-2,-3
    public function insert($num)
    {
        if ($this->maxHeap->isEmpty() || $num <= $this->maxHeap->top()) {
            $this->maxHeap->insert($num);
        } else {
            $this->minHeap->insert($num);
        }

        if ($this->maxHeap->count() > $this->minHeap->count() + 1) {
            $this->minHeap->insert($this->maxHeap->extract());
        } else if ($this->maxHeap->count() < $this->minHeap->count()) {
            $this->maxHeap->insert($this->minHeap->extract());
        }
    }

    public function findMedian()
    {
            if ($this->maxHeap->count() == $this->minHeap->count()) {
                return  round(($this->maxHeap->top()+$this->minHeap->top())/2,2);
            }

        return  $this->maxHeap->top();
    }
}