<?php
/*
 Problem Statement #
Given a set of numbers that might contain duplicates,
 find all of its distinct subsets.

Example 1:
Input: [1, 3, 3]
Output: [], [1], [3], [1,3], [3,3], [1,3,3]

Example 2:
Input: [1, 5, 3, 3]
Output: [], [1], [5], [3], [1,5], [1,3], [5,3], [1,5,3], [3,3], [1,3,3], [3,3,5], [1,5,3,3]
 */
/*
    1          3
  /  \  \        \
      3  3        3
      \
       3
*/

$arr = [1, 2, 2];
$arr = [1,1,2,2];
$arr = [1, 3, 3];
var_dump(findSubsets($arr));


//$arr = [1, 3, 3];
//var_dump(findSubsets($arr));
//
//$arr = [1, 5, 3, 3];
//var_dump(findSubsets($arr));
function findSubsets($arr) {
    $res = [];
    $path = [];
    $res[] = $path;
    helper($arr, 0, $path,  $res);

    return $res;
}

function helper($arr, $start, $path, &$res) {

    for ($i = $start; $i < count($arr); $i++) {

        if ($i > $start &&$arr[$i] == $arr[$i-1]) continue;

        $path[] = $arr[$i];
        $res[] = $path;
        helper($arr, $i+1, $path, $res);
        array_pop($path);
    }
}