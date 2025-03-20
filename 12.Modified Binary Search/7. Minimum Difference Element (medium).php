<?php
/*
Problem Statement #
Given an array of numbers sorted in ascending order,
find the element in the array that has the minimum difference with the given ‘key’.

Example 1:

Input: [4, 6, 10], key = 7
Output: 6
Explanation: The difference between the key '7' and '6' is minimum than any other number in the array
Example 2:

Input: [4, 6, 10], key = 4
Output: 4
Example 3:

Input: [1, 3, 8, 10, 15], key = 12
Output: 10
Example 4:

Input: [4, 6, 10], key = 17
Output: 10
 */


$arr = [4, 6, 10];
$key = 17;

$arr = [1, 3, 8, 10, 15];
$key = 12;

$arr = [4, 6, 10];
$key = 4;

$arr = [4, 6, 10];
$key = 6;
var_dump(findMinDiff($arr, $key));
function findMinDiff($arr, $key) {

    $left = 0;
    $right = count($arr)-1;
    if ($arr[$right] < $key) {
        return $arr[$right];
    }

    while ($left < $right) {
        $mid = $left + intval(($right-$left+1)/2);
        if ($arr[$mid] <= $key ) {
            $left = $mid;
        } else {
            $right = $mid-1;
        }
    }

    return  $arr[$left];
}