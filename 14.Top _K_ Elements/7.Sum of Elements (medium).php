<?php
/*
 Problem Statement #
Given an array, find the sum of all numbers between the K1’th and K2’th smallest elements of that array.

Example 1:

Input: [1, 3, 12, 5, 15, 11], and K1=3, K2=6
Output: 23
Explanation: The 3rd smallest number is 5 and 6th smallest number 15. The sum of numbers coming
between 5 and 15 is 23 (11+12).
Example 2:

Input: [3, 5, 8, 7], and K1=1, K2=4
Output: 12
Explanation: The sum of the numbers between the 1st smallest number (3) and the 4th smallest
number (8) is 12 (5+7).

 */

$nums = [1, 3, 12, 5, 15, 11];
$k1 = 3;
$k2 = 6;
var_dump(findSumOfElements($nums, $k1, $k2)) ;
function  findSumOfElements($nums, $k1, $k2) {

    $sum = 0;

    $minHeap = new SplMinHeap();
    foreach ($nums as $index => $num) {
        $minHeap->insert($num);
    }

    $i = 1;
    while (!$minHeap->isEmpty()) {

        if ($i > $k2) {
            break;
        }

        $item = $minHeap->extract();
        if ($i > $k1 && $i <$k2) {
            $sum+= $item;
        }

        $i++;
    }

    return $sum;
}