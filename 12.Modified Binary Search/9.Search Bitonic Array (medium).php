<?php
/*
2#
Given a Bitonic array, find if a given ‘key’ is present in it.
 An array is considered bitonic if it is monotonically increasing and then monotonically decreasing.
 Monotonically increasing or decreasing means that for any index i in the array arr[i] != arr[i+1].

Write a function to return the index of the ‘key’. If the ‘key’ is not present, return -1.

Example 1:

Input: [1, 3, 8, 4, 3], key=4
Output: 3
Example 2:

Input: [3, 8, 3, 1], key=8
Output: 1
Example 3:

Input: [1, 3, 8, 12], key=12
Output: 3
Example 4:

Input: [10, 9, 8], key=10
Output: 0
 */

$arr = [1, 3, 8, 4, 3];
$key = 4;
var_dump(findKey($arr, $key));


function findKey($arr, $key) {
    $maxIdx = findMax($arr);

    if ($arr[$maxIdx] == $key) return  $maxIdx;


      $idx =  findVal($arr, 0, $maxIdx-1, $key);
      if ($idx != -1) {
          return $idx;
      }

     return findVal($arr, $maxIdx+1, count($arr)-1, $key);
}

function findMax($arr) {
    $left = 0;
    $right = count($arr)-1;

    while ($left < $right) {
        $mid = $left + intval(($right-$left)/2);

        if ($arr[$mid] < $arr[$mid+1]) {
            $left = $mid+1;
        } else {
            $right = $mid;
        }
    }

    return $left;
}

function findVal($arr, $start, $end, $val) {

    while ($start <= $end) {
        $mid = $start + intval(($start-$end)/2);
        if ($arr[$mid] == $val) {
            return $mid;
        } else if ($arr[$mid] > $val) {
            $end = $mid-1;
        } else {
            $start = $mid+1;
        }
    }

    return  -1;
}