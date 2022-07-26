<?php
/*
 Problem Statement #
Given an array arr of unsorted numbers and a target sum, count all triplets in it such that arr[i] + arr[j] + arr[k] < target where i, j, and k are three different indices. Write a function to return the count of such triplets.

Example 1:

Input: [-1, 0, 2, 3], target=3
Output: 2
Explanation: There are two triplets whose sum is less than the target: [-1, 0, 3], [-1, 0, 2]

Example 2:
Input: [-1, 4, 2, 1, 3], target=5
Output: 4
Explanation: There are four triplets whose sum is less than the target:
   [-1, 1, 4], [-1, 1, 3], [-1, 1, 2], [-1, 2, 3]

 */

//$arr = [-1, 0, 2, 3];
//$target = 3;
//echo searchTriplets($arr, $target) . PHP_EOL;


$arr = [-1, 4, 2, 1, 3];
$target = 5;
echo searchTriplets($arr, $target) . PHP_EOL;

function searchTriplets($arr, $target) {

    sort($arr);

    $len = count($arr);
    $right = $len-1;
    $ret = 0;
    for($i = 0; $i < $len-2; $i++) {
        $left = $i+1;
        while ($left < $right) {
            $sum = $arr[$i] + $arr[$left] + $arr[$right];
            if ($sum < $target) {
                $ret += ($right-$left);
                $left++;
            } else {
                $right--;
            }
        }
    }

    return $ret;
}