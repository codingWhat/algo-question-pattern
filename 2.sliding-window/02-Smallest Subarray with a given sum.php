<?php
/*
 Given an array of positive numbers and a positive number ‘S’,
 find the length of the smallest contiguous subarray whose sum is greater than or equal to ‘S’. Return 0, if no such subarray exists.

Example 1:

Input: [2, 1, 5, 2, 3, 2], S=7
Output: 2
Explanation: The smallest subarray with a sum great than or equal to '7' is [5, 2].
Example 2:

Input: [2, 1, 5, 2, 8], S=7
Output: 1
Explanation: The smallest subarray with a sum greater than or equal to '7' is [8].
Example 3:

Input: [3, 4, 1, 1, 6], S=8
Output: 3
Explanation: Smallest subarrays with a sum greater than or equal to '8' are [3, 4, 1] or [1, 1, 6].
 */
$arr = [2, 1, 5, 2, 3, 2];
$s = 7;
echo "get:" . getMinLenArr($arr, $s) . ", want:2" . PHP_EOL;

$arr = [2, 1, 5, 2, 8];
$s = 7;
echo "get:" . getMinLenArr($arr, $s) . ", want:1" . PHP_EOL;

$arr = [3, 4, 1, 1, 6];
$s = 8;
echo "get:" . getMinLenArr($arr, $s) . ", want:3". PHP_EOL;


$arr = [2, 1, 5, 2, 3, 2];
$s = 7;
var_dump(getMinLenArrV1($arr, $s));
$arr = [2, 1, 5, 2, 8];
$s = 7;
var_dump(getMinLenArrV1($arr, $s));
$arr = [3, 4, 1, 1, 6];
$s = 8;
var_dump(getMinLenArrV1($arr, $s));

function getMinLenArrV1($arr, $s) {
    $right = 0;
    $left = 0;
    $sum = 0;
    $minLen = PHP_INT_MAX;
    while ($right < count($arr)) {

        $sum += $arr[$right];
        while ($sum >= $s) {
            $minLen = min($minLen, $right-$left+1);
            $sum -= $arr[$left];
            $left++;
        }

        $right++;
    }

    return $minLen;
}

function getMinLenArr($arr, $s) {
    $start = 0;
    $sum = 0;
    $res = PHP_INT_MAX;
    for ($end = 0; $end < count($arr); $end++) {
        $sum += $arr[$end];
        while ($sum >= $s) {
            $res = min($res, $end-$start+1);
            $sum -= $arr[$start];
            $start++;
        }
    }

    return $res;
}