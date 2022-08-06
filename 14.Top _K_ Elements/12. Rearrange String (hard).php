<?php
/*
 Problem Statement #
Given a string, find if its letters can be rearranged in such a way that no two same characters come next to each other.

Example 1:
Input: "aappp"
Output: "papap"
Explanation: In "papap", none of the repeating characters come next to each other.

Example 2:

Input: "Programming"
Output: "rgmrgmPiano" or "gmringmrPoa" or "gmrPagimnor", etc.
Explanation: None of the repeating characters come next to each other.
Example 3:

Input: "aapa"
Output: ""
Explanation: In all arrangements of "aapa", atleast two 'a' will come together e.g., "apaa", "paaa".
 */

class MyMaxHeap extends SplMaxHeap {
    protected function compare($value1, $value2):int
    {
       return $value1[1] - $value2[1];
    }
}
$str = "Programming";
//$str = "apaa";
$str = "aap";
//$str = "aappp";
echo rearrangeString($str);
function rearrangeString($str) {
    $strFreq = [];
    for ($i = 0; $i < strlen($str); $i++) {
        !isset($strFreq[$str[$i]]) && $strFreq[$str[$i]] = 0;
        $strFreq[$str[$i]]++;
    }


    $maxHeap = new MyMaxHeap();
    foreach ($strFreq as $char => $num) {
        $maxHeap->insert([$char, $num]);
    }


    $ret = "";
    while (!$maxHeap->isEmpty()) {
        $item = $maxHeap->extract();
        if (strlen($ret) > 0) {
            $len = strlen($ret);
            if ($ret[$len-1] == $item[0]) {
                return "";
            }
        }

        $ret.= $item[0];
        $item[1] -= 1;
        if ($item[1] > 0 ) {
            $maxHeap->insert($item);
        }
    }

    return  $ret;
}