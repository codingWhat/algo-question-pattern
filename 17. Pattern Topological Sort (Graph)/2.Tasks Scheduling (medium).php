<?php
/*
 Problem Statement #
There are ‘N’ tasks, labeled from ‘0’ to ‘N-1’. Each task can have some prerequisite tasks which need to be completed before it can be scheduled. Given the number of tasks and a list of prerequisite pairs, find out if it is possible to schedule all the tasks.

Example 1:
Input: Tasks=3, Prerequisites=[0, 1], [1, 2]
Output: true
Explanation: To execute task '1', task '0' needs to finish first. Similarly, task '1' needs to finish
before '2' can be scheduled. A possible sceduling of tasks is: [0, 1, 2]

Example 2:
Input: Tasks=3, Prerequisites=[0, 1], [1, 2], [2, 0]
Output: false
Explanation: The tasks have cyclic dependency, therefore they cannot be sceduled.

Example 3:
Input: Tasks=6, Prerequisites=[2, 5], [0, 5], [0, 4], [1, 4], [3, 2], [1, 3]
Output: true
Explanation: A possible sceduling of tasks is: [0 1 4 3 2 5]
 */

$tasks = 3;
//$prerequisites = [[0, 1], [1, 2]];
$prerequisites = [[0, 1], [1, 2], [2, 0]];
$prerequisites = [ [2, 5], [0, 5], [0, 4], [1, 4], [3, 2], [1, 3]];
$tasks = 6;
//var_dump(isSchedulingPossible($prerequisites, $tasks));

function  isSchedulingPossible($prerequisites, $tasks) {
    $inDegree = [];
    $next = [];
    foreach ($prerequisites as $index => $prerequisite) {
        !isset($inDegree[$prerequisite[1]]) && $inDegree[$prerequisite[1]]= 0;
        !isset($inDegree[$prerequisite[0]]) && $inDegree[$prerequisite[0]]= 0;
        $inDegree[$prerequisite[1]]++;

        !isset($next[$prerequisite[0]]) && $next[$prerequisite[0]]= [];
        $next[$prerequisite[0]][] = $prerequisite[1];
    }

    $queue = [];
    foreach ($inDegree as $index => $num) {
        if ($num == 0) {
            $queue[] = $num;
        }
    }
    $ret = [];
    while (!empty($queue)) {
        $task = array_shift($queue);
        $ret[] = $task;
        if (!isset($next[$task])) continue;

        foreach ($next[$task] as $index => $t) {
            $inDegree[$t]--;
            if ($inDegree[$t] == 0) {
                $queue[] = $t;
            }
        }
    }

    return count($ret) == $tasks;
}