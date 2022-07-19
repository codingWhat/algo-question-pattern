<?php
/*

Problem Statement #
Given an array containing 0s and 1s, if you are allowed to replace no more than ‘k’ 0s with 1s, find the length of the longest contiguous subarray having all 1s.

Example 1:

Input: Array=[0, 1, 1, 0, 0, 0, 1, 1, 0, 1, 1], k=2
Output: 6
Explanation: Replace the '0' at index 5 and 8 to have the longest contiguous subarray of 1s having length 6.
Example 2:

Input: Array=[0, 1, 0, 0, 1, 1, 0, 1, 1, 0, 0, 1, 1], k=3
Output: 9
Explanation: Replace the '0' at index 6, 9, and 10 to have the longest contiguous subarray of 1s having length 9.

 */
//$arr = [0, 1, 1, 0, 0, 0, 1, 1, 0, 1, 1];
$arr = [0, 0, 0, 1, 0, 0, 1, 1, 0, 1, 1];
$k = 2;
echo findLength($arr, $k) . PHP_EOL;



$arr = [0, 1, 0, 0, 1, 1, 0, 1];
$k = 3;
echo findLength($arr, $k) . PHP_EOL;


function findLength($arr, $k) {

    $maxOne = 0;
    $j = 0;

    $res = 0;
    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] == 1) {
            $maxOne++;
        }

        if (($i - $j + 1 - $maxOne) > $k) {
            if ($arr[$j] == 1) $maxOne--;
            $j++;
        }
        $res = max($res, $i-$j+1);
    }

    return $res;
}