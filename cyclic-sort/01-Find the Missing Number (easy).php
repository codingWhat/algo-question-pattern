<?php
/*
 We are given an array containing ‘n’ distinct numbers taken from the range 0 to ‘n’. Since the array has only ‘n’ numbers out of the total ‘n+1’ numbers, find the missing number.

Example 1:

Input: [4, 0, 3, 1]
Output: 2
Example 2:

Input: [8, 3, 5, 2, 4, 6, 0, 1]
Output: 7
 */
$arr = [4, 0, 3, 1];
echo "get:" . findMissingNumber($arr) . ", want:2" . PHP_EOL;
$arr = [8, 3, 5, 2, 4, 6, 0, 1];
//echo "get:" . findMissingNumbers($arr) . ", want:7" . PHP_EOL;


function findMissingNumber($arr) {
//    //这种方式是以$i为基准去比较，
//    for ($i = 0; $i < count($arr); ++ $i) {
//        //如果arr[i]并不是i,需要继续交换, 找到对应的元素(一定能找到，因为 distinct numbers taken from the range 0 to ‘n’.
//        while ($arr[$i] < count($arr) && $arr[$i] != $i) {
//            $tmp1 = $arr[$i];
//            $arr[$i] = $arr[$tmp1];
//            $arr[$tmp1] = $tmp1;
//        }
//    }
//
//    for ($i = 0; $i < count($arr); ++ $i) {
//        if ($arr[$i] != $i) {
//            return $i;
//        }
//    }
//    return $i;

    //以arr[i]为基准索引去比较交换
    for ($i = 0; $i < count($arr); ++ $i) {
        //一直比较交换，直到满足当前value和value索引所对应值一样。
        //arr[i] 为索引
        //arr[arr[i]] 索引对应的值
         while ($arr[$i] < count($arr) && $arr[$i] != $arr[$arr[$i]]) {
             swap($arr, $i, $arr[$i]);
         }
    }

    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] != $i) {
            return $i;
        }
    }

    return -1;


}

function swap(&$arr, $i, $j) {
    $tmp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $tmp;
}