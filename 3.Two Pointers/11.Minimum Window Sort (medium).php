<?php
/*
 Minimum Window Sort (medium) #
Given an array, find the length of the smallest subarray in it which when sorted will sort the whole array.

Example 1:

Input: [1, 2, 5, 3, 7, 10, 9, 12]
Output: 5
Explanation: We need to sort only the subarray [5, 3, 7, 10, 9] to make the whole array sorted
Example 2:

Input: [1, 3, 2, 0, -1, 7, 10]
Output: 5
Explanation: We need to sort only the subarray [1, 3, 2, 0, -1] to make the whole array sorted
Example 3:

Input: [1, 2, 3]
Output: 0
Explanation: The array is already sorted
Example 4:

Input: [3, 2, 1]
Output: 3
Explanation: The whole array needs to be sorted.
 */

//时间复杂度 O(n)
//空间复杂度 O(1)
$arr = [1, 3, 2, 0, -1, 7, 10];
$arr = [2,6,4,8,10,9,15];
echo smallestSortSubarr($arr);
function smallestSortSubarr($arr) {

    $low = 0;
    $high = count($arr)-1;
    while ($low < $high && $arr[$low] < $arr[$low+1]) {
        $low++;
    }

    if ($low == $high) {
        return 0;
    }

    while ($high > 0 && $arr[$high] > $arr[$high-1]) {
        $high--;
    }



    $min = PHP_INT_MAX;
    $max = PHP_INT_MIN;
    for ($i = $low; $i <= $high; $i++) {
        $min = min($min, $arr[$i]);
        $max = max($max, $arr[$i]);
    }

    for ( ;$arr[$low-1] > $min && $low > 0; $low--);

    for (; $arr[$high+1] < $max && $high < count($arr)-1; $high++);

    return $high-$low+1;
}
