<?php
/*
Rearrange String K Distance Apart (hard) #
Given a string and a number ‘K’, find if the string can be rearranged such that the same characters are at least ‘K’ distance apart from each other.

Example 1:

Input: "mmpp", K=2
Output: "mpmp" or "pmpm"
Explanation: All same characters are 2 distance apart.
Example 2:

Input: "Programming", K=3
Output: "rgmPrgmiano" or "gmringmrPoa" or "gmrPagimnor" and a few more
Explanation: All same characters are 3 distance apart.
Example 3:

Input: "aab", K=2
Output: "aba"
Explanation: All same characters are 2 distance apart.

Example 4:
Input: "aappa", K=3
Output: ""
Explanation: We cannot find an arrangement of the string where any two 'a' are 3 distance apart.
 */


class MyMaxHeap extends SplMaxHeap {
    protected function compare($value1, $value2):int
    {
        return $value1[1] - $value2[1];
    }
}

$str = "mmpp";
$k = 2;

$str = "Programming";
$k = 3;
echo reorganizeString($str, $k);

function reorganizeString($str, $k) {
    $strFreq = [];
    for ($i = 0; $i < strlen($str); $i++) {
        !isset($strFreq[$str[$i]]) && $strFreq[$str[$i]] = 0;
        $strFreq[$str[$i]]++;
    }


    $maxHeap = new MyMaxHeap();
    foreach ($strFreq as $char => $num) {
        $maxHeap->insert([$char, $num]);
    }

    $queue = [];
    $ret = "";
    while (!$maxHeap->isEmpty()) {
        $item  = $maxHeap->extract();

        $ret .= $item[0];
        $item[1] -= 1;
        $queue[] = $item;
        if (count($queue) == $k) {
            $tmpItem = array_shift($queue);
            if ($tmpItem[1] > 0) {
                $maxHeap->insert($tmpItem);
            }
        }
    }

    return $ret;
}

//class MyMaxHeap extends SplMaxHeap {
//    protected function compare($value1, $value2) :int
//    {
//        return $value1[1] * $value1[2] -  $value2[1] * $value2[2];
//    }
//
//}
//function reorganizeString($str, $k) {
//
//    $stFreq = [];
//    for ($i = 0; $i < strlen($str); $i++) {
//        !isset($stFreq[$str[$i]]) && $stFreq[$str[$i]] = 0;
//        $stFreq[$str[$i]]++;
//    }
//
//    if (count($stFreq) < $k) {
//        return "";
//    }
//
//    $maxHeap = new MyMaxHeap();
//    foreach ($stFreq as $str => $num) {
//        $maxHeap->insert([$str, $num, $k]);
//    }
//
//    $ret = "";
//    while (!$maxHeap->isEmpty()) {
//        $item = $maxHeap->extract();
//        if (strlen($ret) > 0) {
//            $len = strlen($ret);
//            if ($ret[$len-1] == $item[0]) {
//                return "";
//            }
//        }
//
//        $ret.= $item[0];
//        $item[1] -= 1;
//        if ($item[1] > 0 ) {
//            $item[2] -= 1;
//            $maxHeap->insert($item);
//        }
//    }
//
//    return  $ret;
//}