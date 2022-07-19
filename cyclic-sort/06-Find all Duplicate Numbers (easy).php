<?php
/**
Problem Statement #
We are given an unsorted array containing ‘n’ numbers taken from the range 1 to ‘n’. The array has some duplicates, find all the duplicate numbers without using any extra space.

Example 1:
Input: [3, 4, 4, 5, 5]
Output: [4, 5]

Example 2:
Input: [5, 4, 7, 2, 3, 5, 3]
Output: [3, 5]
 */

$arr = [3, 4, 4, 5, 5];
echo "get:" . findAllDuplicates($arr). ", want:[4, 5]" . PHP_EOL;

$arr = [5, 4, 7, 2, 3, 5, 3];
echo "get:" . findAllDuplicates($arr). ", want:[3, 5]" . PHP_EOL;

function findAllDuplicates($arr) {

    for ($i = 0; $i < count($arr); $i++) {
        while ($arr[$i] != $arr[$arr[$i]-1]) {
            echo "i:{$i}, arr:" . json_encode($arr) . PHP_EOL;
            swap($arr, $i, $arr[$i]-1);
        }
    }

    $res  = [];
    for ($j = 0; $j < count($arr); $j++) {
        if ($arr[$j] != $j+1) {
            $res[] = $arr[$j];
        }
    }
    return implode(",", $res);

//    $res = [];
//    for ($i = 0; $i < count($arr); $i++) {
//        $idx = abs($arr[$i])-1;
//        if ($arr[$idx] < 0) {
//            $res[] = abs($arr[$i]);
//        } else {
//            $arr[$idx] *= -1;
//        }
//    }
//
//    return implode(",", $res);
}


function swap(&$arr, $i, $j) {
     $tmp = $arr[$i];
     $arr[$i] = $arr[$j];
     $arr[$j] = $tmp;
}