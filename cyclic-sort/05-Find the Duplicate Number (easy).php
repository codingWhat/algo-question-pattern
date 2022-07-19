<?php
/**
We are given an unsorted array containing ‘n+1’ numbers taken from the range 1 to ‘n’. The array has only one duplicate but it can be repeated multiple times. Find that duplicate number without using any extra space. You are, however, allowed to modify the input array.

Example 1:

Input: [1, 4, 4, 3, 2]
Output: 4
 *
Example 2:
Input: [2, 1, 3, 3, 5, 4]
Output: 3

Example 3:
Input: [2, 4, 1, 4, 4]
Output: 4
 */
$arr = [1, 4, 4, 3, 2];
echo "get:". findDuplicateNumber($arr) . ", want:4" . PHP_EOL;

$arr = [2, 1, 3, 3, 5, 4];
echo "get:". findDuplicateNumber($arr) . ", want:3" . PHP_EOL;

$arr = [2, 4, 1, 4, 4];
echo "get:". findDuplicateNumber($arr) . ", want:4" . PHP_EOL;


function findDuplicateNumber($arr) {

    for ($i = 0; $i < count($arr); $i++) {
        $curr = abs($arr[$i]);
        if ($arr[$curr-1] < 0) return $curr;

        $arr[$curr-1] *= -1;
    }

    return -1;
}
