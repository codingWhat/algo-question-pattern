<?php
/*
Problem Statement #
Given a set of distinct numbers, find all of its permutations.

Permutation is defined as the re-arranging of the elements of the set.
For example, {1, 2, 3} has the following six permutations:

{1, 2, 3}
{1, 3, 2}
{2, 1, 3}
{2, 3, 1}
{3, 1, 2}
{3, 2, 1}
If a set has ‘n’ distinct elements it will have n!n! permutations.

Example 1:
Input: [1,3,5]
Output: [1,3,5], [1,5,3], [3,1,5], [3,5,1], [5,1,3], [5,3,1]
 */

$arr = [1,3,5];
$arr = [1,2,3];
$arr = [1,2,2];

var_export(findPermutations($arr));
function findPermutations($arr) {
    $path = [];
    $res = [];
    $visited = [];
    helper($arr, $visited, $path,$res);

    return $res;
}

function helper($arr, $visited, $path, &$res) {

    if (count($path) == count($arr)) {
        $res[] = $path;
        return;
    }

    for ($i = 0; $i < count($arr); $i++) {
        if (isset($visited[$i])) {
            continue;
        }
            //112
           //第一个1，第二个1重复，必须要判断第一个1没被选中
          //否则，在第一个1的dfs中，第二个1被跳过了
        if ($i > 0 && $arr[$i-1] == $arr[$i] && !isset($visited[$i-1])) continue;

        $visited[$i] = true;
        $path[] = $arr[$i];
        helper($arr, $visited, $path, $res);
        unset($visited[$i]);
        array_pop($path);
    }
}