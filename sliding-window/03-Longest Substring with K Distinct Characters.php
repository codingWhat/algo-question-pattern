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

function getMaxLenStr($str, $k) {
    $match = [];
    $start = 0;
    $maxLen = 0;
    for ($end = 0; $end < strlen($str); $end++) {
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