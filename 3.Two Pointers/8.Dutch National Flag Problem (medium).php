<?php
/*
Problem Statement #
Given an array containing 0s, 1s and 2s, sort the array in-place. You should treat numbers of the array as objects, hence, we can’t count 0s, 1s, and 2s to recreate the array.

The flag of the Netherlands consists of three colors: red, white and blue; and since our input array also consists of three different numbers that is why it is called Dutch National Flag problem.

Example 1:

Input: [1, 0, 2, 1, 0]
Output: [0 0 1 1 2]
Example 2:

Input: [2, 2, 0, 1, 2, 0]
Output: [0 0 1 2 2 2 ]
 */
//$arr = [1, 0, 2, 1, 0];
//sortK($arr);

$arr = [2, 2, 0, 1, 2, 0];
//sortColors($arr);
//var_dump($arr);


sortK($arr);
var_dump($arr);
function sortK(&$arr) {

    //使用三路快排

    //先定义区间
    //[left, right] -> [0, count(arr)]
    //[left,i]
    //(i, j)
    //(k, right]

    // 在初始化
    // left =0, i = -1
    //  j = 0
    // [right+1, right], k = count(arr)

    $i = -1;
    $j = 0;
    $k = count($arr);
    while ($j < $k) {
        if ($arr[$j] == 0) {
            $i++;
            swap($arr,$i, $j);
            $j++;
        }else if ($arr[$j] == 1) {
            $j++;
        }else {
            $k--;
            swap($arr, $k, $j);
        }
    }
}



function swap(&$arr, $i, $j) {
    $tmp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $tmp;
}