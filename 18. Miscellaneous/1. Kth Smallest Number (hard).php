<?php
/*
Problem Statement #
Given an unsorted array of numbers, find Kth smallest number in it.

Please note that it is the Kth smallest number in the sorted order, not the Kth distinct element.

Example 1:
Input: [1, 5, 12, 2, 11, 5], K = 3
Output: 5
Explanation: The 3rd smallest number is '5', as the first two smaller numbers are [1, 2].

Example 2:
Input: [1, 5, 12, 2, 11, 5], K = 4
Output: 5
Explanation: The 4th smallest number is '5', as the first three small numbers are [1, 2, 5].

Example 3:
Input: [5, 12, 11, -1, 12], K = 3
Output: 11
Explanation: The 3rd smallest number is '11', as the first two small numbers are [5, -1].
 */

//最小堆。最大堆

//第一种快排 partition思路

$arr = [1, 5, 12, 2, 11, 5];
$k = 3;

$arr = [1, 5, 12, 2, 11, 5];
$k = 4;

$arr = [5, 12, 11, -1, 12];
$k = 3;
var_dump(findKthNum($arr, $k));
function findKthNum($arr, $k) {

    $left = 0;
    $right = count($arr)-1;

    while ($left <= $right) {
       // echo  "-->arr:". json_encode($arr) . PHP_EOL;
        $pivot = partition($arr, $left, $right);
        echo "pivotIdx:{$pivot}, arr:". json_encode($arr) . PHP_EOL;
        if ($pivot == $k-1) {
            return $arr[$pivot];
        } else if ($pivot < $k-1) {
            $left = $pivot+1;
        } else {
            $right = $pivot-1;
        }
    }

    return  -1;
}

function partition(&$arr, $left, $right) {
    $randIdx = mt_rand($left, $right);
    swap($arr, $randIdx, $left);

    $pivot = $arr[$left];
    echo "-->pivot:{$pivot} ,  arr:". json_encode($arr) . PHP_EOL;
    // [left+1, i] //小等于pivot
    // (j, right] //大于pivot
    $i = $left;
    $j = $right;

    while ($i < $j) {
        while ($i <= $j && $arr[$i] <= $pivot) $i++;
        while ($j >= $i && $arr[$j] > $pivot) $j--;
         if ($i > $j) {
             break;
         }

        swap($arr, $i, $j);
    }

    swap($arr, $left, $j);

    return $j;
}

function swap(&$arr, $i, $j) {
    $tmp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $tmp;
}