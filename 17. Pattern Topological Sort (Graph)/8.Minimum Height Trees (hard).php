<?php
/*
Minimum Height Trees (hard) #
We are given an undirected graph that has characteristics of a k-ary tree.
 In such a graph, we can choose any node as the root to make a k-ary tree.
The root (or the tree) with the minimum height will be called Minimum Height Tree (MHT).
 There can be multiple MHTs for a graph.
 In this problem, we need to find all those roots which give us MHTs.
Write a method to find all MHTs of the given graph and return a list of their roots.

Example 1:

Input: vertices: 5, Edges: [[0, 1], [1, 2], [1, 3], [2, 4]]
Output:[1, 2]
Explanation: Choosing '1' or '2' as roots give us MHTs. In the below diagram, we can see that the
height of the trees with roots '1' or '2' is three which is minimum.
 */

$vertices = 5;
$edges = [[0, 1], [1, 2], [1, 3], [2, 4]];

var_dump(findMinimumHeightTree($vertices, $edges));
function findMinimumHeightTree($vertices, $edges) {

    $inDegree = [];
    $next = [];
    foreach ($edges as $index => $edge) {
        !isset($inDegree[$edge[1]]) && $inDegree[$edge[1]] = 0;
        !isset($inDegree[$edge[0]]) && $inDegree[$edge[0]] = 0;

        !isset($next[$edge[0]]) && $next[$edge[0]] = [];
        !isset($next[$edge[1]]) && $next[$edge[1]] = [];

        $next[$edge[0]][] = $edge[1];
        $next[$edge[1]][] = $edge[0];
        $inDegree[$edge[1]]++;
        $inDegree[$edge[0]]++;
    }


    $queue = [];
    foreach ($inDegree as $item => $num) {
        if ($num == 1) {
            $queue[] = $item;
        }
    }

    $ret = [];
    while ($vertices > 2) {
        $size = count($queue);
        $vertices -= $size;

        for ($i = 0; $i < $size; $i++) {
            $num = array_shift($queue);
            echo  "num:{$num}, next:". json_encode($next).", indegree:". json_encode($inDegree) . PHP_EOL;
            foreach ($next[$num] as $index => $child) {
                $inDegree[$child]--;
                if ($inDegree[$child] == 1) {
                    $queue[] = $child;
                }
            }
        }
    }

    $ret[] = $queue;
    return $ret;
//    foreach ($inDegree as $item => $num) {
//        $queue = [$item];
//        var_dump(helper($queue, $inDegree, $next));
//    }

}

//function helper($queue, $inDegree, $next) {
//
//    $height  = 1;
//    while (!empty($queue)) {
//        $item = array_shift($queue);
//        foreach ($next[$item] as $index => $child) {
//            $inDegree[$child]--;
//            if ($inDegree[$child] == 0) {
//                $queue[] = $child;
//            }
//        }
//    }
//}