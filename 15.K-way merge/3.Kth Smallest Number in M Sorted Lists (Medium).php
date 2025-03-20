<?php
/*
 Problem Statement #
Given ‘M’ sorted arrays, find the K’th smallest number among all the arrays.

Example 1:
Input: L1=[2, 6, 8], L2=[3, 6, 7], L3=[1, 3, 4], K=5
Output: 4
Explanation: The 5th smallest number among all the arrays is 4, this can be verified from the merged
list of all the arrays: [1, 2, 3, 3, 4, 6, 6, 7, 8]

Example 2:
Input: L1=[5, 8, 9], L2=[1, 7], K=3
Output: 7
Explanation: The 3rd smallest number among all the arrays is 7.
 */


class MyMinHeap extends  SplMinHeap {

    protected function compare($value1, $value2):int
    {
           return  $value2[0] - $value1[0];
    }
}


$arr = [
    [2, 6, 8],
    [3, 6, 7],
    [1, 3, 4]
];
$k = 5;

$arr = [
    [5, 8, 9],
    [1, 7]
];
$k = 3;
var_dump(findKthSmallest($arr, $k));

function findKthSmallest($arrs, $k) {

    $minHeap = new MyMinHeap();
    foreach ($arrs as $index => $arr) {
        $minHeap->insert($arr);
    }

    while (!$minHeap->isEmpty()) {
        $cur  = $minHeap->extract();
        $k--;
        if ($k == 0) {
            return $cur[0];
        }

        array_shift($cur);
       !empty($cur) &&  $minHeap->insert($cur);
    }

    return  -1;
}