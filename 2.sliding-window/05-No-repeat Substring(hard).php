<?php
/**
Given a string, find the length of the longest substring which has no repeating characters.

Example 1:

Input: String="aabccbb"
Output: 3
Explanation: The longest substring without any repeating characters is "abc".
Example 2:

Input: String="abbbb"
Output: 2
Explanation: The longest substring without any repeating characters is "ab".
Example 3:

Input: String="abccde"
Output: 3
Explanation: Longest substrings without any repeating characters are "abc" & "cde".

 */
$str = "aabccbb";
echo "get:" . getLongestUniqStr ($str) . ", want:abc-3" . PHP_EOL;
$str = "abbbb";
echo "get:" . getLongestUniqStr ($str) . ", want:ab-2" . PHP_EOL;
$str = "abccde";
echo "get:" . getLongestUniqStr ($str) . ", want:abc-3" . PHP_EOL;
$str = "bbbb";
echo "get:" . getLongestUniqStr ($str) . ", want:b-1" . PHP_EOL;

$str = "tmmzuxt";
echo "get:" . getLongestUniqStr ($str) . ", want:mzux-5" . PHP_EOL;

function getLongestUniqStr ($str) {

    $posCount = [];
    $start = 0;
    $maxLen = 0;
    for ($end = 0; $end < strlen($str); $end++) {

        if (isset($posCount[$str[$end]])) {
            $start = max($start, $posCount[$str[$end]]+1);
        }

        $maxLen = max($maxLen, $end-$start+1);

        $posCount[$str[$end]] = $end;
    }

    return $maxLen;
}