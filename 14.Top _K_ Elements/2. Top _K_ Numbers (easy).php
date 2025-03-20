<?php
/*
 Problem Statement #
Given an unsorted array of numbers, find the ‘K’ largest numbers in it.

Note: For a detailed discussion about different approaches to solve this problem,
take a look at Kth Smallest Number.

Example 1:

Input: [3, 1, 5, 12, 2, 11], K = 3
Output: [5, 12, 11]

Example 2:
Input: [5, 12, 11, -1, 12], K = 3
Output: [12, 11, 12]
 */

$arr = [3, 1, 5, 12, 2, 11];
$arr = [5, 12, 11, -1, 12];
$k = 3;
var_dump(findKLargest($arr, $k));

function findKLargest($arr, $k) {

    $minHeap = new SplMinHeap();

    foreach ($arr as $index => $item) {
        if ($minHeap->count() < $k) {
            $minHeap->insert($item);
        } else if ($minHeap->top() < $item) {
            $minHeap->extract();
            $minHeap->insert($item);
        }
    }

    $ret = [];
    //O(N*logK) + O(K)
    while (!$minHeap->isEmpty()) {
        $ret[] = $minHeap->extract();
    }

    return $ret;
}