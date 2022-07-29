<?php
/*

leetcode 41
Given an unsorted array containing numbers, find the smallest missing positive number in it.

Example 1:
Input: [-3, 1, 5, 4, 2]
Output: 3
Explanation: The smallest missing positive number is '3'

Example 2:
Input: [3, -2, 0, 1, 2]
Output: 4

Example 3:
Input: [3, 2, 5, 1]
Output: 4
 */
$arr = [-3, 1, 5, 4, 2];
echo "get:" . findSmallestMissingPositiveNumber($arr) . "want:3" . PHP_EOL;

$arr = [3, -2, 0, 1, 2];
// [1,-2,0,3,2]
// [-2,1,0,3,2]
// [-2,1,0,3,2]
// [0,1,-2,3,2]
// [0,1,-2,3,2]
// [0,1,2,3,-2]
echo "get:" . findSmallestMissingPositiveNumber($arr) . "want:4" . PHP_EOL;

$arr = [3, 2, 5, 1];
echo "get:" . findSmallestMissingPositiveNumber($arr) . "want:4" . PHP_EOL;
//


function findSmallestMissingPositiveNumber($arr) {

    for ($i = 0; $i < count($arr); $i++) {
        while ($arr[$i] >= 1 && $arr[$i] < count($arr) && $arr[$i] != $arr[$arr[$i]-1]) {
            swap($arr, $i, $arr[$i]-1);
        }
    }

    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] != $i+1) {
            return $i+1;
        }
    }

    return -1;
}

function swap (&$arr, $i, $j)  {
    $tmp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $tmp;
}