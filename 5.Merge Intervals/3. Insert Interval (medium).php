<?php

/*
Problem Statement #
Given a list of non-overlapping intervals sorted by their start time, insert a given interval at the correct position and merge all necessary intervals to produce a list that has only mutually exclusive intervals.

Example 1:

Input: Intervals=[[1,3], [5,7], [8,12]], New Interval=[4,6]
Output: [[1,3], [4,7], [8,12]]
Explanation: After insertion, since [4,6] overlaps with [5,7], we merged them into one [4,7].
Example 2:

Input: Intervals=[[1,3], [5,7], [8,12]], New Interval=[4,10]
Output: [[1,3], [4,12]]
Explanation: After insertion, since [4,10] overlaps with [5,7] & [8,12], we merged them into [4,12].
Example 3:

Input: Intervals=[[2,3],[5,7]], New Interval=[1,4]
Output: [[1,4], [5,7]]

[3,4] , [1,2]
Explanation: After insertion, since [1,4] overlaps with [2,3], we merged them into one [1,4].

 */
//$intervals = [[1,3], [5,7], [8,12]];
//$interval = [4,6];
//var_dump(insertInterval($intervals, $interval));
////
//$intervals = [[1,3], [5,7], [8,12]];
////[2,4]
//$interval = [4,10];
//var_dump(insertInterval($intervals, $interval));
////
////
//$intervals = [[2,3],[5,7]];
//$interval = [1,4];
//var_dump(insertInterval($intervals, $interval));
////
////
//
//$intervals = [[1,2],[3,5],[6,7],[8,10],[12,16]];
//$interval = [4,8];
//var_dump(insertInterval($intervals, $interval));

$intervals = [[1,5]];
$interval = [0,0];
var_dump(insertInterval($intervals, $interval));

function insertInterval($intervals, $interval) {

    if (empty($intervals)) return array($interval);

    $i = 0;
    $prev = [];
    $ret = [];
    //先找到插入位置
    //然后就是合并区间的逻辑
    while ($i < count($intervals)) {
        $cur = $intervals[$i];
       // echo "prev:". json_encode($prev) . PHP_EOL;
        if ($cur[1] < $interval[0]) { //[先找到插入位置] 插入数组大
            $prev = $interval;
            $ret[] = $cur;
        }else if($cur[0] <= $interval[1]) { //[先找到插入位置] ，如果和上一个元素有交集
            $prev = [min($cur[0], $interval[0], $prev?$prev[0]: PHP_INT_MAX), max($interval[1], $cur[1], $prev?$prev[1]: PHP_INT_MIN)];
        } else if ($cur[0] > $interval[1]) {
            //[先找到插入位置] 插入数组小
            $prev = $cur;
            $ret[] = $interval;
        }else if ($prev && $cur[0] > $prev[1]) { //[找到插入位置]  插入区间比上一个区间大
            $ret[] = $prev;
            $prev =  $cur;
        }else if ($prev && $prev[1] >= $cur[0] /* $prev[0] <= $cur[0] && $prev[1] <= $cur[1]*/) { //[找到插入位置] 插入区间 和当前区间有交集
//           $prev = [$prev[0], $cur[1]];
           $prev = [min($prev[0], $cur[0]), max($cur[1], $prev[1])];
        }

       $i++;
    }

    $ret[] = $prev;
    return $ret;
}