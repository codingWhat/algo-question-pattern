<?php
/*
K Pairs with Largest Sums (Hard) #
Given two sorted arrays in descending order,
find ‘K’ pairs with the largest sum where each pair consists of numbers from both the arrays.

Example 1:
Input: L1=[9, 8, 2], L2=[6, 3, 1], K=3
Output: [9, 3], [9, 6], [8, 6]
Explanation: These 3 pairs have the largest sum. No other pair has a sum larger than any of these.

Example 2:
Input: L1=[5, 2, 1], L2=[2, -1], K=3
Output: [5, 2], [5, -1], [2, 2]
 */

class MyMaxHeap extends SplMaxHeap {
    protected function compare($value1, $value2):int
    {
        return ($value1[0] + $value1[1]) - ($value2[0] + $value2[1]);
    }
}

$arr1 = [9, 8, 2];
$arr2 = [6, 3, 1];
$k = 3;

$arr1 = [5, 2, 1];
$arr2 = [2, -1];
$k = 3;

//时间复杂度: On * Om * logK
var_dump(findKLargestPairs($arr1, $arr2, $k));
function  findKLargestPairs($arr1, $arr2, $k) {

    $l1 = count($arr1);
    $l2 = count($arr2);

    $maxHeap = new MyMaxHeap();
    for ($i = 0; $i < $l1; $i++) {
        for ($j = 0; $j < $l2; $j++) {
            $maxHeap->insert([$arr1[$i], $arr2[$j]]);
        }
    }

    $ret = [];
    for ($i = 0; $i < $k; $i++) {
        $ret[] = $maxHeap->extract();
    }

    return $ret;
}