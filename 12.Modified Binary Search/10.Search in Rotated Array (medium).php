<?php
/*
Search in Rotated Array (medium) #
Given an array of numbers which is sorted in ascending order and also rotated by some arbitrary number, find if a given ‘key’ is present in it.

Write a function to return the index of the ‘key’ in the rotated array.
 If the ‘key’ is not present, return -1. You can assume that the given array does not have any duplicates.

Example 1:
Input: [10, 15, 1, 3, 8], key = 15
Output: 1
Explanation: '15' is present in the array at index '1'.
  1
  3
  8
  10
  15
 Original array:
 Array after 2 rotations:
  10
  15
  1
  3
  8

Example 2:
Input: [4, 5, 7, 9, 10, -1, 2], key = 10
Output: 4
Explanation: '10' is present in the array at index '4'.
 */

$arr = [10, 15, 1, 3, 8];
$key = 15;

$arr = [4, 5, 7, 9, 10, -1, 2];
$key = 10;
var_dump(findKey($arr, $key));
function findKey($arr, $key) {
    $left = 0;
    $right = count($arr)-1;

    while ($left <= $right) {
          $mid = $left + intval(($right-$left)/2);

          if ($arr[$mid] == $key) return  $mid;

          if ($arr[$mid] > $arr[$left]) {
                if ($arr[$left] <= $key && $arr[$mid-1] >= $key) {
                    $right = $mid-1;
                } else {
                    $left = $mid+1;
                }
          } else {
                  if ($arr[$mid+1] <= $key &&  $key <= $arr[$right]) {
                      $left = $mid+1;
                  } else {
                      $right = $mid-1;
                  }
          }
    }

    return -1;
}