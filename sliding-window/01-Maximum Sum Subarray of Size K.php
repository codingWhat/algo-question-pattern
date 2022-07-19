<?php
/*
Given an array of positive numbers and a positive number ‘k’, find the maximum sum of any contiguous subarray of size ‘k’.

Example 1:

Input: [2, 1, 5, 1, 3, 2], k=3
Output: 9
Explanation: Subarray with maximum sum is [5, 1, 3].
Example 2:

Input: [2, 3, 4, 1, 5], k=2
Output: 7
Explanation: Subarray with maximum sum is [3, 4].
 */
$arr = [2, 1, 5, 1, 3, 2];
$k = 3;
echo "start ...." . PHP_EOL;
echo "get:" .getSubarrayMaxSum($arr, $k). ", want:9". PHP_EOL;

$arr = [2, 3, 4, 1, 5];
$k = 2;
echo "get:" . getSubarrayMaxSum($arr, $k) .", want:7" . PHP_EOL;


//求连续k个元素构成的最大和
function getSubarrayMaxSum($arr, $k) {

    $start = 0;
    $res = 0;
    $sum = 0;
    for ($end = 0; $end < count($arr); $end++) {
        $sum += $arr[$end];
        if ($end >= $k-1) {
            $res = max($res, $sum);
            $sum -= $arr[$start];
            $start++;
        }
    }

    return $res;
}