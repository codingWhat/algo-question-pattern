<?php
/*

Problem Statement #
Given an array of sorted numbers, remove all duplicates from it. You should not use any extra space; after removing the duplicates in-place return the new length of the array.

Example 1:

Input: [2, 3, 3, 3, 6, 9, 9]
Output: 4
Explanation: The first four elements after removing the duplicates will be [2, 3, 6, 9].
Example 2:

Input: [2, 2, 2, 11]
Output: 2
Explanation: The first two elements after removing the duplicates will be [2, 11].

 */

$arr = [2, 3, 3, 3, 6, 9, 9];
echo remove($arr) . PHP_EOL;

$arr = [2, 2, 2, 11];
echo remove($arr);

function remove($arr) {
    $left = 0;
    $right = 1;

    while ($right < count($arr)) {
        if ($arr[$right] != $arr[$right-1]) {
            $left++;
            $arr[$left] = $arr[$right];
        }
        $right++;
    }

    return $left+1;
}
