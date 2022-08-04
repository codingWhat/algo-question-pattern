<?php
/*
Problem Statement #
Given an array of numbers sorted in ascending order, find the range of a given number ‘key’.
 The range of the ‘key’ will be the first and last position of the ‘key’ in the array.

Write a function to return the range of the ‘key’. If the ‘key’ is not present return [-1, -1].

Example 1:

Input: [4, 6, 6, 6, 9], key = 6
Output: [1, 3]

Example 2:
Input: [1, 3, 8, 10, 15], key = 10
Output: [3, 3]
Example 3:

Input: [1, 3, 8, 10, 15], key = 12
Output: [-1, -1]
 */

$arr = [4, 6, 6, 6, 9];
$key = 6;

//$arr = [1, 3, 8, 10, 15];
//$key = 12;

var_dump(findRange($arr, $key));
function findRange($arr, $key) {
    return  [ findFirst($arr, $key), findLast($arr, $key)];
}

function findFirst($arr, $key) {
    $left = 0;
    $right = count($arr)-1;

    while ($left <= $right) {
        $mid = $left + intval(($right-$left)/2);
        if ($arr[$mid] == $key) {
            $right = $mid;
        } elseif ($arr[$mid] < $key) {
            $right = $mid-1;
        }  else {
            $left = $mid+1;
        }
    }

    if ($arr[$left] == $key) return $left+1;

    return -1;

}

function findLast($arr, $key) {
    $left = 0;
    $right = count($arr)-1;

    while ($left < $right) {
        $mid = $left + intval(($right-$left+1)/2);
        // echo "mid:{$mid}" . PHP_EOL;
        if ($arr[$mid] == $key) {
            $left = $mid;
        } else if ($arr[$mid] > $key) {
            $right = $mid-1;
        }  else {
            $left = $mid+1;
        }
    }
    //var_dump($left+1);
    if ($left >= 0 && $arr[$left] == $key) return $left;

    return -1;
}