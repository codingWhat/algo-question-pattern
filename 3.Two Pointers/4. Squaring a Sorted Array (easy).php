<?php
/*
Problem Statement #
Given a sorted array, create a new array containing squares of all the number of the input array in the sorted order.

Example 1:

Input: [-2, -1, 0, 2, 3]
Output: [0, 1, 4, 4, 9]

Example 2:
Input: [-3, -1, 0, 1, 2]
Output: [0 1 1 4 9]
 */


$arr = [-2, -1, 0, 2, 3];
var_dump(makeSquares($arr));


$arr = [-3, -1, 0, 1, 2];
var_dump(makeSquares($arr));
function makeSquares($arr) {
        $left = 0;
        $right = count($arr)-1;
        $ret = [];
        $k = count($arr)-1;
        while ($left <= $right) {
            $l = $arr[$left]*$arr[$left];
            $r = $arr[$right]* $arr[$right];

            if ($l >= $r) {
                $ret[$k] = $l;
                //array_unshift($ret, $l);
                $left++;
            } else {
                $ret[$k] = $r;
                //array_unshift($ret, $r);
                $right--;
            }
            $k--;
        }

        return $ret;
}