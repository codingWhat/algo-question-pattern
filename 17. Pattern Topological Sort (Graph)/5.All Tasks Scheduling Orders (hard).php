<?php
/*
Problem Statement #
There are ‘N’ tasks, labeled from ‘0’ to ‘N-1’.
 Each task can have some prerequisite tasks which need to be completed before it can be scheduled.
 Given the number of tasks and a list of prerequisite pairs,
write a method to print all possible ordering of tasks meeting all prerequisites.

Example 1:

Input: Tasks=3, Prerequisites=[0, 1], [1, 2]
Output: [0, 1, 2]
Explanation: There is only possible ordering of the tasks.
Example 2:

Input: Tasks=4, Prerequisites=[3, 2], [3, 0], [2, 0], [2, 1]
Output:
1) [3, 2, 0, 1]
2) [3, 2, 1, 0]
Explanation: There are two possible orderings of the tasks meeting all prerequisites.
Example 3:

Input: Tasks=6, Prerequisites=[2, 5], [0, 5], [0, 4], [1, 4], [3, 2], [1, 3]
Output:
1) [0, 1, 4, 3, 2, 5]
2) [0, 1, 3, 4, 2, 5]
3) [0, 1, 3, 2, 4, 5]
4) [0, 1, 3, 2, 5, 4]
5) [1, 0, 3, 4, 2, 5]
6) [1, 0, 3, 2, 4, 5]
7) [1, 0, 3, 2, 5, 4]
8) [1, 0, 4, 3, 2, 5]
9) [1, 3, 0, 2, 4, 5]
10) [1, 3, 0, 2, 5, 4]
11) [1, 3, 0, 4, 2, 5]
12) [1, 3, 2, 0, 5, 4]
13) [1, 3, 2, 0, 4, 5]
 */
//时间空间复杂度:O(v! * E)
$prerequisites = [[0, 1], [1, 2]];
$tasks = 3;

$prerequisites = [[2, 5], [0, 5], [0, 4], [1, 4], [3, 2], [1, 3]];
$tasks = 6;

//$prerequisites = [[3, 2], [3, 0], [2, 0], [2, 1]];
//$tasks = 4;
topSort($prerequisites, $tasks);
function topSort($prerequisites, $tasks) {

    $inDegree = [];
    $next = [];
    foreach ($prerequisites as $index => $prerequisite) {
        !isset($inDegree[$prerequisite[1]])  && $inDegree[$prerequisite[1]] = 0;
        !isset($inDegree[$prerequisite[0]])  && $inDegree[$prerequisite[0]] = 0;
        $inDegree[$prerequisite[1]]++;

        !isset($next[$prerequisite[0]])  && $next[$prerequisite[0]] = [];
        !isset($next[$prerequisite[1]])  && $next[$prerequisite[1]] = []; //很重要，省去繁琐判断
        $next[$prerequisite[0]][] = $prerequisite[1];
    }

    $queue = [];
    foreach ($inDegree as $index => $num) {
        if ($num == 0) {
            $queue[] = $index;
        }
    }

    $path =  [];
    $ret  = [];
    helperV1($next, $inDegree, $queue, $path, $ret);

    var_dump($ret);

//    $ret = [];
//
//    for ($i = 0; $i < count($queue); $i++) {
//        $path = [];
//        helper($queue[$i], $path, $next, $inDegree, $ret);
//    }
//
//    return $ret;
}

function helperV1($next, $inDegree, $queue, $path, &$ret) {

    if (!empty($queue)) {
        foreach ($queue as  $num) {
            $path[] = $num;
            $nQueue = $queue;
            $idx = array_search($num, $nQueue);
            unset($nQueue[$idx]);
            $nQueue = array_values($nQueue);
         //   if (!isset($next[$num])) continue; //不能有这行，没有和array_pop形成对应，会出现重复问题
            echo "queue:".json_encode($queue) . ", nQueue:".json_encode($nQueue) .  ", path: " .  json_encode($path) . ", num:{$num}, next:" . json_encode($next[$num]). ", indegree:" . json_encode($inDegree). PHP_EOL;
            foreach ($next[$num] as $index => $child) {
                $inDegree[$child]--;
                if ($inDegree[$child] == 0){
                    $nQueue[] = $child;
                }
            }

            helperV1($next, $inDegree, $nQueue, $path, $ret);
            array_pop($path);
            foreach ($next[$num] as $index => $child) {
                $inDegree[$child]++;
            }
        }
    }

    if (count($path) == count($inDegree)) {
       // var_dump($path);
        $ret[] = $path;
    }
}

function helper($cur, $path, $next, $inDegree, &$ret) {
    if (count($path) == count($inDegree)) {
        $ret[] = $path;
        return;
    }

    if (!isset($next[$cur])) return;

    $path[] = $cur;
    echo "path:" . json_encode($path) . PHP_EOL;
    foreach ($next[$cur] as $index => $item) {
        $path[] = $item;

        array_pop($path);
    }

    helper($item, $path, $next, $inDegree, $ret);
}