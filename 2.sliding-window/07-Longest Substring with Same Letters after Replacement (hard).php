<?php
/**
Given a string with lowercase letters only, if you are allowed to replace no more than ‘k’ letters with any letter, find the length of the longest substring having the same letters after replacement.

Example 1:
Input: String="aabccbb", k=2
Output: 5
Explanation: Replace the two 'c' with 'b' to have a longest repeating substring "bbbbb".

Example 2:
Input: String="abbcb", k=1
Output: 4
Explanation: Replace the 'c' with 'b' to have a longest repeating substring "bbbb".

Example 3:
Input: String="abccde", k=1
Output: 3
Explanation: Replace the 'b' or 'd' with 'c' to have the longest repeating substring "ccc".
 */

$str = "aabccbb";
$k = 2;
var_dump(findLongestSubstrWithSameLettersAfterReplacement($str, $k));


function findLongestSubstrWithSameLettersAfterReplacement($str, $k) {

    $left = 0;
    $len = strlen($str);
    $right = 0;
    $stat = [];
    $maxRepeatCnt = 0;

    $res = 0;
    while ($right < $len) {
        $cur = $str[$right];
        !isset($stat[$cur]) && $stat[$cur] = 0;
        $stat[$cur]++;

        $maxRepeatCnt = max($maxRepeatCnt, $stat[$cur]);

        //$maxRepeatCnt 代表有一个元素重复次数，那么有($right-$left+1 - $maxRepeatCnt)各元素可以替换
        if (($right-$left+1 - $maxRepeatCnt) > $k) {
            echo  "left:{$left}, right:{$right}, maxRepeatCnt:{$maxRepeatCnt}" . PHP_EOL;
            $leftCh = $str[$left];
            $stat[$leftCh]--;
            $left++;
        }

        $res = max($res, $right-$left+1);
        $right++;
    }

    return $res;
}