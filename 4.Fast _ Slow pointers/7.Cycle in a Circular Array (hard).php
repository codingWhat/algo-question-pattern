<?php
/*
Cycle in a Circular Array (hard) #
We are given an array containing positive and negative numbers. Suppose the array contains a number ‘M’ at a particular index. Now, if ‘M’ is positive we will move forward ‘M’ indices and if ‘M’ is negative move backwards ‘M’ indices. You should assume that the array is circular which means two things:

If, while moving forward, we reach the end of the array, we will jump to the first element to continue the movement.
If, while moving backward, we reach the beginning of the array, we will jump to the last element to continue the movement.
Write a method to determine if the array has a cycle. The cycle should have more than one element and should follow one direction which means the cycle should not contain both forward and backward movements.

Example 1:

Input: [1, 2, -1, 2, 2]
Output: true
Explanation: The array has a cycle among indices: 0 -> 1 -> 3 -> 0
Example 2:

Input: [2, 2, -1, 2]
Output: true
Explanation: The array has a cycle among indices: 1 -> 3 -> 1
Example 3:

Input: [2, 1, -1, -2]
Output: false
Explanation: The array does not have any cycle.
 */
//时间复杂度：
//$arr = [1, 2, -1, 2, 2];
//var_dump(loopExists($arr));
////
//$arr = [2, 2, -1, 2];
//var_dump(loopExists($arr));
//
//$arr = [2, 1, -1, -2];
//var_dump(loopExists($arr));


$arr = [-2,-17,-1,-2,-2];
var_dump(loopExists($arr));
function loopExists($arr) {

    for ($i = 0; $i < count($arr); $i++) {
        $slow = $fast = $i;
        $direction = $arr[0] >= 0;
        if (isset($visited[$i])) continue;
        do {
            $slow = findIdx($arr, $direction, $slow);
            $fast = findIdx($arr, $direction, $fast);
            if ($fast != -1) {
                $fast =  findIdx($arr, $direction, $fast);
            }

        } while($fast != -1 && $slow != -1 && $fast != $slow);

        if ($fast != -1 && $fast== $slow) return  true;

        $visited[$fast] = true;
    }


    return false;
}

function findIdx($arr, $isForward, $curIdx) {
    $direction = $arr[$curIdx] >=0;
    if ($isForward != $direction) {
        return -1;
    }

    $nextIdx = ($curIdx + $arr[$curIdx]) % count($arr);

    if ($nextIdx < 0) {
        $nextIdx += count($arr);
    }

    if ($nextIdx == $curIdx) {
        return  -1;
    }

    return  $nextIdx;
}