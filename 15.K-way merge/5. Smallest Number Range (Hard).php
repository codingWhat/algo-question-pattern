<?php
/*
Problem Statement #
Given ‘M’ sorted arrays, find the smallest range that includes at least one number from each of the ‘M’ lists.

Example 1:

Input: L1=[1, 5, 8], L2=[4, 12], L3=[7, 8, 10]
Output: [4, 7]
Explanation: The range [4, 7] includes 5 from L1, 4 from L2 and 7 from L3.
Example 2:

Input: L1=[1, 9], L2=[4, 12], L3=[7, 10, 16]
Output: [9, 12]
Explanation: The range [9, 12] includes 9 from L1, 12 from L2 and 10 from L3.
 */




class MyMinHeap extends SplMinHeap {
    protected function compare($value1, $value2) : int
    {
        return $value2[0] - $value1[0];
    }

}
$arrs = [
    [1, 5, 8],
    [4, 12],
    [7, 8, 10]
];
//
//$arrs = [
//    [1, 9],
//    [4, 12],
//    [7, 10, 16]
//];
//

var_dump(findMinRange($arrs));

function findMinRange($arrs) {

    $range = [];
    $minHeap = new MyMinHeap();
    foreach ($arrs as $index => $item) {
        $range[] = $item[0];
        $minHeap->insert($item);
    }

    $start = min($range);
    $end = max($range);
    while (!$minHeap->isEmpty()) {
        $item = $minHeap->extract();
        if (!in_array($item[0], $range)) {
            $range[] = $item[0];
        }

        if (count($range) < 3) {
            break;
        }

        $s1 = min($range);
        $e1 = max($range);
        if (($e1-$s1) < ($end-$start)) {
            $end = $e1;
            $start = $s1;
        }

        $t = array_shift($item);
        if ($t) {
           unset($range[array_search( $t, $range)]);
        }

        if (!empty($item)) {
            $range[] = $item[0];
            $minHeap->insert($item);
        }
    }

    return [$start, $end];
}