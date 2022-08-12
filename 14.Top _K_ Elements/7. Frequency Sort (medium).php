<?php
/*
 Problem Statement #
Given a string, sort it based on the decreasing frequency of its characters.

Example 1:
Input: "Programming"
Output: "rrggmmPiano"
Explanation: 'r', 'g', and 'm' appeared twice, so they need to appear before any other character.

Example 2:
Input: "abcbab"
Output: "bbbaac"
Explanation: 'b' appeared three times, 'a' appeared twice, and 'c' appeared only once.
 */

class MyMaxHeap extends  SplMaxHeap {
    public function compare($item1, $item2)
    {
        return $item1[1]-$item2[1];
    }
}

$str = "Programming";
$str = "abcbab";
echo sortCharacterByFrequency($str) . PHP_EOL;
function sortCharacterByFrequency($str) {
    $stat = [];
    for ($i = 0; $i < strlen($str); $i++) {
        !isset($stat[$str[$i]]) && $stat[$str[$i]] = [$str[$i], 0];
        $stat[$str[$i]][1]++;
    }

    $maxHeap = new MyMaxHeap();
    foreach ($stat as  $item) {
        $maxHeap->insert($item);
    }

    $ret = "";
    while (!$maxHeap->isEmpty()) {
        $item = $maxHeap->extract();
        for ($i = 0; $i < $item[1]; $i++) {
            $ret .= $item[0];
        }
    }

    return $ret;
}