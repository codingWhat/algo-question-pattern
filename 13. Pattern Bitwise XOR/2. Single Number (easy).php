<?php
/*
Problem Statement #
In a non-empty array of integers, every number appears twice except for one, find that single number.

Example 1:

Input: 1, 4, 2, 1, 3, 2, 3
Output: 4
Example 2:

Input: 7, 9, 7
Output: 9
 */

$arr = [1, 4, 2, 1, 3, 2, 3];
echo findSingleNum($arr);
function findSingleNum($arr) {

    if (empty($arr)) return 0;

    $res = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        $res ^= $arr[$i];
    }

    return  $res;
}