<?php
/*
Given a string, find the length of the longest substring in it with no more than K distinct characters.

Example 1:

Input: String="araaci", K=2
Output: 4
Explanation: The longest substring with no more than '2' distinct characters is "araa".

Example 2:
Input: String="araaci", K=1
Output: 2
Explanation: The longest substring with no more than '1' distinct characters is "aa".

Example 3:
Input: String="cbbebi", K=3
Output: 5
Explanation: The longest substrings with no more than '3' distinct characters are "cbbeb" & "bbebi".
 */
$str = "araaci";
$k =2;
echo "get:" . getMaxLenStr($str, $k) . ", want:4" . PHP_EOL;
$str = "araaci";
$k = 1;
echo "get:" . getMaxLenStr($str, $k) . ", want:2" . PHP_EOL;
$str = "cbbebi";
$k = 3;
echo "get:" . getMaxLenStr($str, $k) . ", want:5" . PHP_EOL;

$str = "cbebi";
$k = 3;
echo "get:" . getMaxLenStr($str, $k) . ", want:4" . PHP_EOL;

$str = "araaci";
$k =2;
var_dump(getMaxLenStrV1($str, $k));
$str = "araaci";
$k = 1;
var_dump(getMaxLenStrV1($str, $k));
$str = "cbbebi";
$k = 3;
var_dump(getMaxLenStrV1($str, $k));
$str = "cbebi";
$k = 3;
var_dump(getMaxLenStrV1($str, $k));


function getMaxLenStrV1($str, $k) {
    $stat = [];
    $left = 0;
    $right = 0;
    $maxLen = PHP_INT_MIN;
    while ($right < strlen($str)) {
        $cur = $str[$right];
        !isset($stat[$cur]) && $stat[$cur]=0;
        $stat[$cur]++;

        while (count($stat) > $k) {
            $leftCh = $str[$left];
            $stat[$leftCh]--;
            if ($stat[$leftCh] == 0 ){
                unset($stat[$leftCh]);
            }
            $left++;
        }

        $maxLen = max($maxLen, $right-$left+1);
        $right++;
    }

    return $maxLen;
}

function getMaxLenStr($str, $k) {
    $match = [];
    $start = 0;
    $maxLen = 0;
    for ($end = 0; $end < strlen($str); $end++) {
        !isset($match[$str[$end]]) && $match[$str[$end]]=0;
        $match[$str[$end]]++;

        if (count($match) == $k) {
            $maxLen = max($maxLen, $end-$start+1);
        }

        while (count($match) > $k) {
            $match[$str[$start]]--;
            if ($match[$str[$start]] == 0) {
                unset($match[$str[$start]]);
            }
            $start++;
        }


    }

    return $maxLen;
}