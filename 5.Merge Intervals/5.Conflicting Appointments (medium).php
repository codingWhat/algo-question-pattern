<?php
/*
 Problem Statement #
Given an array of intervals representing ‘N’ appointments, find out if a person can attend all the appointments.

Example 1:

Appointments: [[1,4], [2,5], [7,9]]
Output: false
Explanation: Since [1,4] and [2,5] overlap, a person cannot attend both of these appointments.
Example 2:

Appointments: [[6,7], [2,4], [8,12]]
Output: true
Explanation: None of the appointments overlap, therefore a person can attend all of them.
Example 3:

Appointments: [[4,5], [2,3], [3,6]]
Output: false
Explanation: Since [4,5] and [3,6] overlap, a person cannot attend both of these appointments.
 */

$arr = [[1,4], [2,5], [7,9]];
var_dump(canAttendAppointments($arr));

$arr = [[6,7], [2,4], [8,12]];
var_dump(canAttendAppointments($arr));

$arr = [[4,5], [2,3], [3,6]];
var_dump(canAttendAppointments($arr));
function canAttendAppointments($arr) {

    usort($arr, function ($item1, $item2) {
        return $item1[1] - $item2[1];
    });

    $i = 1;
    while ($i < count($arr)) {
        $cur = $arr[$i];
        if ($cur[0] <= $arr[$i-1][1]) {
            return false;
        }

        $i++;
    }

    return  true;
}