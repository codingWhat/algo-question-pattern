<?php
/*
Problem Statement #
Given an array of unsorted numbers and a target number, find a triplet in the array whose sum is as close to the target number as possible, return the sum of the triplet. If there are more than one such triplet, return the sum of the triplet with the smallest sum.

Example 1:

Input: [-2, 0, 1, 2], target=2
Output: 1
Explanation: The triplet [-2, 1, 2] has the closest sum to the target.

Example 2:
Input: [-3, -1, 1, 2], target=1
Output: 0
Explanation: The triplet [-3, 1, 2] has the closest sum to the target.

Example 3:
Input: [1, 0, 1, 1], target=100
Output: 3
Explanation: The triplet [1, 1, 1] has the closest sum to the target.
 */
$arr = [-2, 0, 1, 2];
$sum = 2;
echo searchTriplet($arr, $sum) . PHP_EOL;


$arr = [-3, -1, 1, 2];
$sum = 1;
echo searchTriplet($arr, $sum) . PHP_EOL;


$arr = [1, 0, 1, 1];
$sum = 100;
echo searchTriplet($arr, $sum) . PHP_EOL;
function  searchTriplet($arr, $target) {
    $right = count($arr)-1;
    sort($arr);
    $closeNum = $arr[0] + $arr[1] + $arr[2];
    for ($i = 0; $i < count($arr); $i++) {

        $cur = $arr[$i];
        $left = $i+1;
        while ($left < $right) {
            $sum = $arr[$left] + $arr[$right]+ $cur;
            if (abs($target- $sum) < abs($target-$closeNum)) {
                $closeNum = $sum;
            }

            if ($sum == $target) {
                return  $sum;
            } else if ($sum > $target) {
                $right--;
            } else {
                $left++;
            }
        }
    }

    return $closeNum;
}
