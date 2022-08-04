<?php
/*
Problem Statement #
Given a sorted array of numbers, find if a given number ‘key’ is present in the array.
Though we know that the array is sorted, we don’t know if it’s sorted in ascending or -descending order.
You should assume that the array can have duplicates.

Write a function to return the index of the ‘key’ if it is present in the array, otherwise return -1.

Example 1:

Input: [4, 6, 10], key = 10
Output: 2
Example 2:

Input: [1, 2, 3, 4, 5, 6, 7], key = 5
Output: 4
Example 3:

Input: [10, 6, 4], key = 10
Output: 0
Example 4:

Input: [10, 6, 4], key = 4
Output: 2
 */

//$arr = [4, 6, 10];
//$num = 10;
//var_dump(findIdx($arr, $num));

$arr = [1, 2, 3, 4, 5, 6, 7];
$num = 4;
var_dump(findIdx($arr, $num));


$arr = [10, 6, 4];
$num = 10;
var_dump(findIdx($arr, $num));


function findIdx($arr, $num) {

    $left = 0;
    $right = count($arr)-1;

    while ($left <= $right) {
        $mid = $left +  intval(($right-$left)/2);
        if ($arr[$mid] == $num) {
            return $mid;
        }

        if ($arr[$left] >= $arr[$right]) {
            if ($arr[$mid] > $num) {
                $left = $mid+1;
            } else {
                $right = $mid;
            }

        } else {
            //升序
            if ($arr[$mid] < $num) {
                $left = $mid+1;
            } else {
                $right = $mid;
            }


        }
    }

    return  -1;
}