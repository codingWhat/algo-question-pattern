<?php
/*
 Problem Statement #
There are ‘N’ tasks, labeled from ‘0’ to ‘N-1’. Each task can have some prerequisite tasks which need to be completed before it can be scheduled.
Given the number of tasks and a list of prerequisite pairs, write a method to find the ordering of tasks we should pick to finish all tasks.

Example 1:
Input: Tasks=3, Prerequisites=[0, 1], [1, 2]
Output: [0, 1, 2]
Explanation: To execute task '1', task '0' needs to finish first. Similarly, task '1' needs to finish
before '2' can be scheduled. A possible scheduling of tasks is: [0, 1, 2]

Example 2:
Input: Tasks=3, Prerequisites=[0, 1], [1, 2], [2, 0]
Output: []
Explanation: The tasks have cyclic dependency, therefore they cannot be scheduled.

Example 3:
Input: Tasks=6, Prerequisites=[2, 5], [0, 5], [0, 4], [1, 4], [3, 2], [1, 3]
Output: [0 1 4 3 2 5]
Explanation: A possible scheduling of tasks is: [0 1 4 3 2 5]
 */

$tasks = 6;
$prerequisites = [[2, 5], [0, 5], [0, 4], [1, 4], [3, 2], [1, 3]];

$tasks = 3;
$prerequisites = [[0, 1], [1, 2]];

$tasks = 3;
$prerequisites = [[0, 1], [1, 2], [2,0]];


var_dump( TopologicalSort($tasks, $prerequisites) );
function TopologicalSort($tasks, $prerequisites) {

    $inDegree = [];
    $next = [];
    foreach ($prerequisites as $index => $prerequisite) {
        !isset($inDegree[$prerequisite[0]]) && $inDegree[$prerequisite[0]] = 0;
        !isset($inDegree[$prerequisite[1]]) && $inDegree[$prerequisite[1]] = 0;

        $inDegree[$prerequisite[1]]++;

        !isset($next[$prerequisite[0]]) && $next[$prerequisite[0]] = [];
        $next[$prerequisite[0]][] = $prerequisite[1];
    }

    $queue = [];
    foreach ($inDegree as $index => $num) {
        if ($num == 0) $queue[] = $index;
    }

    $ret = [];
    while (!empty($queue)) {
        $item = array_shift($queue);
        $ret[] = $item;
        if (!isset($next[$item])) continue;
        foreach ($next[$item] as  $i) {
            $inDegree[$i]--;
            if ($inDegree[$i] == 0) {
                $queue[] = $i;
            }
        }
    }

    if (count($ret) != $tasks) {
        return  [];
    }

    return $ret;
}