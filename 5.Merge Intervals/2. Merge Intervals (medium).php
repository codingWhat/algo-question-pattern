<?php
/*
 Problem Statement #
Given a list of intervals, merge all the overlapping intervals to produce a list that has only mutually exclusive intervals.

Example 1:

Intervals: [[1,4], [2,5], [7,9]]
Output: [[1,5], [7,9]]
Explanation: Since the first two intervals [1,4] and [2,5] overlap, we merged them into
one [1,5].
svg viewer
Example 2:

Intervals: [[6,7], [2,4], [5,9]]
Output: [[2,4], [5,9]]
Explanation: Since the intervals [6,7] and [5,9] overlap, we merged them into one [5,9].

Example 3:

Intervals: [[1,4], [2,6], [3,5]]
Output: [[1,6]]
Explanation: Since all the given intervals overlap, we merged them into one.
 */
$arr = [[1,4], [7,9], [2,5]];
var_dump(merge($arr));
function merge($arr) {
    usort($arr, function ($item1, $item2) {
        return $item1[0] - $item2[0];
    });

    $prev = $arr[0];
    $i = 1;
    $ret = [];
    while ($i < count($arr)) {
        $cur = $arr[$i];
        if ($cur[0] > $prev[1]) {
            $ret[] = $prev;
            $prev = $cur;
        } elseif ($cur[0] >= $prev[0] && $cur[1] >= $prev[1]) {
            $prev = [$prev[0], $cur[1]];
        }
        $i++;
    }
    $ret[] = $prev;
    return $ret;
}