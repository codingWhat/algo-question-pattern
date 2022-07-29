<?php
/*
 Employee Free Time (hard) #
For ‘K’ employees, we are given a list of intervals representing the working hours of each employee.
Our goal is to find out if there is a free interval that is common to all employees.
You can assume that each list of employee working hours is sorted on the start time.

Example 1:

Input: Employee Working Hours=[[[1,3], [5,6]], [[2,3], [6,8]]]

Output: [3,5]
Explanation: Both the employess are free between [3,5].
Example 2:

Input: Employee Working Hours=[[[1,3], [9,12]], [[2,4]], [[6,8]]]
Output: [4,6], [8,9]
Explanation: All employess are free between [4,6] and [8,9].
Example 3:

Input: Employee Working Hours=[[[1,3]], [[2,4]], [[3,5], [7,9]]]
Output: [5,7]
Explanation: All employess are free between [5,7].

 */
$arr = [[[1,3], [5,6]], [[2,3], [6,8]]];
var_dump(findEmployeeFreeTime($arr));

$arr = [[[1,3], [9,12]], [[2,4]], [[6,8]]];
var_dump(findEmployeeFreeTime($arr));

$arr = [[[1,3]], [[2,4]], [[3,5], [7,9]]];
var_dump(findEmployeeFreeTime($arr));
function  findEmployeeFreeTime($arr) {
    $ret = [];
    foreach ($arr as $item) {
        $ret = array_merge($ret, $item);
    }

    $arr = $ret;
    usort($arr, function ($item1, $item2){
        return $item1[0] - $item2[0];
    });


    $i = 1;
    $ret = [];
    while ($i < count($arr)) {

        if ($arr[$i][0] > $arr[$i-1][1]) {
            $ret[] = [$arr[$i-1][1], $arr[$i][0]];
        }
        $i++;
    }

    return $ret;
}
