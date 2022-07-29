<?php
/*
 Problem Statement #
Given two lists of intervals, find the intersection of these two lists. Each list consists of disjoint intervals sorted on their start time.

Example 1:

Input: arr1=[[1, 3], [5, 6], [7, 9]], arr2=[[2, 3], [5, 7]]

//[1,3], [2,3], [5,6],[5,7], [7,9]

Output: [2, 3], [5, 6], [7, 7]
Explanation: The output list contains the common intervals between the two lists.


Example 2:
Input: arr1=[[1, 3], [5, 7], [9, 12]], arr2=[[5, 10]]
Output: [5, 7], [9, 10]
Explanation: The output list contains the common intervals between the two lists.
 */


$arr1=[[1, 3], [5, 6], [7, 9]];
$arr2=[[2, 3], [5, 7]];

//var_dump(merge($arr1, $arr2));
var_dump(mergeV1($arr1, $arr2));


$arr1=[[1, 3], [5, 7], [9, 12]];
$arr2=[[5, 10]];

//var_dump(merge($arr1, $arr2));
var_dump(mergeV1($arr1, $arr2));


function mergeV1($arr1, $arr2) {
    $i = 0;
    $j = 0;
    $ret = [];
    while ($i < count($arr1) && $j < count($arr2)) {
        //交集
        //区间的start必然位于另一个区间中
          if (($arr1[$i][0] >= $arr2[$j][0] && $arr1[$i][0] <= $arr2[$j][1]) ||
              ($arr2[$j][0] >= $arr1[$i][0] && $arr2[$j][0] <= $arr1[$i][1])) {
              $ret[] = [max($arr1[$i][0], $arr2[$j][0]), min($arr1[$i][1], $arr2[$j][1])];
          }

          if ($arr1[$i][1] < $arr2[$j][1]) {
              $i++;
          } else {
              $j++;
          }
    }

    return $ret;
}

function merge($arr1, $arr2) {
    $arr = array_merge($arr1 , $arr2);
    usort($arr, function ($item1, $item2) {
       return $item1[1] - $item2[1];
    });

    $i = 1;
    //[1,3], [2,3], [5,6],[5,7], [7,9]
    $prev = $arr[0];
    $ret = [];
    while ($i < count($arr)) {
        $cur = $arr[$i];
        if ($cur[0] > $prev[1]) {
            $prev = $cur;
        }else {
            $ret[] = [max($cur[0], $prev[0]), min($cur[1], $prev[1])];
            $prev = [min($cur[0], $prev[0]), max($prev[1], $cur[1])];
        }
        $i++;
    }

    return $ret;
}