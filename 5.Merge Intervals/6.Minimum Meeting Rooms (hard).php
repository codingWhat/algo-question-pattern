<?php
/*
Minimum Meeting Rooms (hard) #
Given a list of intervals representing the start and end time of ‘N’ meetings, find the minimum number of rooms required to hold all the meetings.

Example 1:

Meetings: [[1,4], [2,5], [7,9]]
Output: 2
Explanation: Since [1,4] and [2,5] overlap, we need two rooms to hold these two meetings. [7,9] can
occur in any of the two rooms later.

Example 2:
Meetings: [[6,7], [2,4], [8,12]]
//[2,4],[6,7],[8,12]
//[2,7], [8,12]
//
Output: 1
Explanation: None of the meetings overlap, therefore we only need one room to hold all meetings.
Example 3:
Meetings: [[1,4], [2,3], [3,6]]
Output:2
Explanation: Since [1,4] overlaps with the other two meetings [2,3] and [3,6], we need two rooms to
hold all the meetings.

Example 4:

Meetings: [[4,5], [2,3], [2,4], [3,5]]
Output: 2
Explanation: We will need one room for [2,3] and [3,5], and another room for [2,4] and [4,5].

Here is a visual representation of Example 4:
 */
//没有重叠, 1
//有重叠，
//$arr = [[1,4], [2,5], [7,9]];
//echo "get:" , findMinimumMeetingRooms($arr).  ", want:2" . PHP_EOL;
//
//
//$arr = [[6,7], [2,4], [8,12]];
//echo "get:" , findMinimumMeetingRooms($arr).  ", want:1" . PHP_EOL;
//
//
//$arr = [[1,4], [2,3], [3,6]];
////[2,3], [1,4], [3,6]
//
//echo "get:" , findMinimumMeetingRooms($arr).  ", want:2" . PHP_EOL;

class MyMinHeap extends SplMinHeap {

    protected function compare($value1, $value2):int
    {
        return $value2[1] - $value1[1];
    }
}

$arr = [[4,5], [2,3], [2,4], [3,5]];
echo "get:" , findMinimumMeetingRooms($arr).  ", want:2" . PHP_EOL;

function findMinimumMeetingRooms($arr) {
// 应该用结束时间排序，只有确定了结束时间，下次循环才能正确判断是否有交集
//[2,3], [1,4]
//[1,4],[2,3]
//[2,3],[1,4]
    usort($arr, function ($item1, $item2){
        return $item1[0] - $item2[0];
    });

    $minHeap = new MyMinHeap();

    $ret = PHP_INT_MIN;
    //[2,3] [2,4] [3,5] [4,5]
    //
    for ($i = 0; $i < count($arr); $i++){

        while (!$minHeap->isEmpty() && $arr[$i][0] >= $minHeap->top()[1]) {
            echo PHP_EOL. "--->. arr[i]:". json_encode($arr[$i]). ", top:" .  json_encode($minHeap->top()) . PHP_EOL;
            $minHeap->extract();
        }

        $minHeap->insert($arr[$i]);
        $ret = max($ret, $minHeap->count());
    }

    return $ret;
}
/*
Similar Problems #

Problem 1: Given a list of intervals, find the point where the maximum number of intervals overlap.
Problem 2: Given a list of intervals representing the arrival and departure times of trains to a train station,
 our goal is to find the minimum number of platforms required for the train station so that no train has to wait.
*/