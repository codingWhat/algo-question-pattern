<?php
/**
We are given an unsorted array containing ‘n’ numbers taken from the range 1 to ‘n’. The array originally contained all the numbers from 1 to ‘n’, but due to a data error, one of the numbers got duplicated which also resulted in one number going missing. Find both these numbers.

Example 1:
Input: [3, 1, 2, 5, 2]
Output: [2, 4]
Explanation: '2' is duplicated and '4' is missing.

Example 2:
Input: [3, 1, 2, 3, 6, 4]
Output: [3, 5]
Explanation: '3' is duplicated and '5' is missing.
 */

$arr = [3, 1, 2, 5, 2];
echo "get:" . findMissingAndDuplicateNumbers($arr) . ", want:[2,4]"  . PHP_EOL;

$arr = [3, 1, 2, 3, 6, 4];
echo "get:" . findMissingAndDuplicateNumbers($arr) . ", want:[3,5]" . PHP_EOL;


function findMissingAndDuplicateNumbers($arr) {

    for ($i = 0; $i < count($arr); $i++) {
        while($arr[$i] != $arr[$arr[$i]-1]) {
            swap($arr, $i, $arr[$i]-1);
        }
    }

    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] != $i+1) {
            $res[] = $arr[$i]; //重复的元素
            $res[] = $i+1; //丢失的元素
        }
    }

    return implode(",", $res);
}


function swap(&$arr, $i, $j) {
    $tmp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $tmp;
}