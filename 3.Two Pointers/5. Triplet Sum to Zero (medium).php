<?php

/*

Problem Statement #
Given an array of unsorted numbers, find all unique triplets in it that add up to zero.

Example 1:

Input: [-3, 0, 1, 2, -1, 1, -2]
Output: [-3, 1, 2], [-2, 0, 2], [-2, 1, 1], [-1, 0, 1]
Explanation: There are four unique triplets whose sum is equal to zero.
Example 2:

Input: [-5, 2, -1, -2, 3]
Output: [[-5, 2, 3], [-2, -1, 3]]
Explanation: There are two unique triplets whose sum is equal to zero.
 */


$arr = [-3, 0, 1, 2, -1, 1, -2];
var_dump(searchTriplets($arr));

//$arr = [-5, 2, -1, -2, 3];
//var_dump(searchTriplets($arr));

function searchTriplets($arr) {

    $res = [];
    $right = count($arr);
    sort($arr);
    for ($i = 0; $i < $right; $i++) {

        $cur = $arr[$i];

        $ret = bts($arr, $i+1, $right-1, 0-$cur);

        foreach ($ret as $item) {
            $item[] = $cur;
            $res[] = $item;
        }
    }

    return $res;
}

function bts($arr, $left, $right, $target) {
    $ret = [];
    while ($left < $right) {
        $sum = $arr[$left] + $arr[$right];
        if ($sum == $target) {
            $ret[] = [$arr[$left], $arr[$right]];
            $left++;
            $right--;
        } else if ($sum > $target) {
            $right--;
        } else {
            $left++;
        }
    }

    return $ret;
}