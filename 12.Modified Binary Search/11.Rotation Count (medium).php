<?php
/*
Rotation Count (medium) #
Given an array of numbers which is sorted in ascending order and is rotated ‘k’ times around a pivot, find ‘k’.

You can assume that the array does not have any duplicates.

Example 1:
Input: [10, 15, 1, 3, 8]
Output: 2
Explanation: The array has been rotated 2 times.
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
Input: [4, 5, 7, 9, 10, -1, 2]
Output: 5
Explanation: The array has been rotated 5 times.
 Original array:
  -1
  2
  4
  5
  7
  9
  10
  4
  5
  7
  9
  10
  -1
  2
 Array after 5 rotations:

Example 3:
Input: [1, 3, 8, 10]
Output: 0
Explanation: The array has been not been rotated.
 */


//$arr = [10, 15, 1, 3, 8];
//$arr = [1, 3, 8, 10];
$arr = [4, 5, 7, 9, 10, -1, 2];
//$arr = [3,4,5,1,2];
//$arr = [4,5,6,7,0,1,2];
var_dump(findRotateCount($arr));
function findRotateCount($arr) {
        $left = 0;
        $right = count($arr)-1;

        while ($left < $right) {
            $mid = $left + intval(($right - $left) / 2);
            if ($arr[$mid] < $arr[$right]) {
                $right = $mid;
            } else {
                $left = $mid+1;
            }
        }

        return  $left;
}