<?php
/*
 给定一个会议时间安排的数组，每个会议时间都会包括开始和结束的时间 [[s1,e1],[s2,e2],…] (si < ei)，
 为避免会议冲突，同时要考虑充分利用会议室资源，请你计算至少需要多少间会议室，才能满足这些会议安排。

示例 1:
输入: [[0, 30],[5, 10],[15, 20]]
输出: 2

示例 2:
输入: [[7,10],[2,4]]
输出: 1
 */

$arr = [[0, 40], [10, 16],[15, 20]];

var_dump(MeetingRooms2($arr));

//$arr = [[7,10],[2,4]];

//var_dump(MeetingRooms2($arr));


function MeetingRooms2($arr) {
    usort($arr, function ($item1, $item2) {
        return $item1[1] - $item2[1] ;
    });

    $ret = [];
    $prev = $arr[0];
    $ret[] = $arr[0];
    $room = 1;
    for ($i = 1; $i < count($arr); $i++) {
        $cur = $arr[$i];
        if ($cur[0] >= $prev[1]) {
           // array_pop($ret);
//            $ret[] = [$prev[0], $cur[1]];
            $prev = [$prev[0], $cur[1]];

        } else {
            $ret[] = $cur;
            $room++;
        }
    }

    return $room;
//    return count($ret);
}