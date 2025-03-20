<?php
/*
 Problem Statement #
Topological Sort of a directed graph (a graph with unidirectional edges) is a linear ordering of
 its vertices such that for every directed edge (U, V) from vertex U to vertex V, U comes
before V in the ordering.

Given a directed graph, find the topological ordering of its vertices.

Example 1:
Input: Vertices=4, Edges=[3, 2], [3, 0], [2, 0], [2, 1]
Output: Following are the two valid topological sorts for the given graph:
1) 3, 2, 0, 1
2) 3, 2, 1, 0

Example 2:
Input: Vertices=5, Edges=[4, 2], [4, 3], [2, 0], [2, 1], [3, 1]
Output: Following are all valid topological sorts for the given graph:
1) 4, 2, 3, 0, 1
2) 4, 3, 2, 0, 1
3) 4, 3, 2, 1, 0
4) 4, 2, 3, 1, 0
5) 4, 2, 0, 3, 1


Example 3:
Input: Vertices=7, Edges=[6, 4], [6, 2], [5, 3], [5, 4], [3, 0], [3, 1], [3, 2], [4, 1]
Output: Following are all valid topological sorts for the given graph:
1) 5, 6, 3, 4, 0, 1, 2
2) 6, 5, 3, 4, 0, 1, 2
3) 5, 6, 4, 3, 0, 2, 1
4) 6, 5, 4, 3, 0, 1, 2
5) 5, 6, 3, 4, 0, 2, 1
6) 5, 6, 3, 4, 1, 2, 0
There are other valid topological ordering of the graph too.
 */

$vertices=4;
$edges=[[3, 2], [3, 0], [2, 0], [2, 1]];

//时间复杂度： On + O(k)
//空间复杂度:  On + O(k)
var_dump(TopologicalSort($edges, $vertices));
function TopologicalSort($edges, $vertices){

    $inDegree = [];
    $outDegree = [];
    foreach ($edges as $index => $edge) {
        !isset($inDegree[$edge[1]]) && $inDegree[$edge[1]]= 0;
        !isset($inDegree[$edge[0]]) && $inDegree[$edge[0]]= 0;
        $inDegree[$edge[1]]++;

        !isset($outDegree[$edge[0]]) && $outDegree[$edge[0]] = [];
        $outDegree[$edge[0]][] = $edge[1];
    }

    $start = -1;
    foreach ($inDegree as $index => $num) {
        if ($num == 0) {
            $start = $index;
            break;
        }
    }

    $queue = [$start];
    $ret = [];

    while (!empty($queue)) {
        $data = array_shift($queue);
        $ret[] = $data;
        if (!isset($outDegree[$data])) continue;
        $next = $outDegree[$data];
        foreach ($next as $index => $num) {
            $inDegree[$num]--;
            if ($inDegree[$num] == 0) {
                $queue[] = $num;
            }
        }
    }

    if (count($ret) != $vertices) {
        return  []; //有环图
    }

    return  $ret;
}