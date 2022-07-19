<?php
/*
 Permutation in a String (hard) #
Given a string and a pattern, find out if the string contains any permutation of the pattern.

Permutation is defined as the re-arranging of the characters of the string. For example, “abc” has the following six permutations:

abc
acb
bac
bca
cab
cba
If a string has ‘n’ distinct characters it will have n!n! permutations.

Example 1:

Input: String="oidbcaf", Pattern="abc"
Output: true
Explanation: The string contains "bca" which is a permutation of the given pattern.
Example 2:

Input: String="odicf", Pattern="dc"
Output: false
Explanation: No permutation of the pattern is present in the given string as a substring.
Example 3:

Input: String="bcdxabcdy", Pattern="bcdyabcdx"
Output: true
Explanation: Both the string and the pattern are a permutation of each other.
Example 4:

Input: String="aaacb", Pattern="abc"
Output: true
Explanation: The string contains "acb" which is a permutation of the given pattern.
 */

// 时间复杂福:o(n)， 空间复杂度: o(p)

$str = "oidbcaf";
$p = "abc";
var_dump(isPermutation($str, $p));


$str = "odicf";
$p = "dc";
var_dump( isPermutation($str, $p));

////
$str = "bcdxabcdy";
$p = "bcdyabcdx";
var_dump( isPermutation($str, $p));
////
$str = "aaacb";
$p = "abc";
var_dump( isPermutation($str, $p));

function isPermutation($str, $p) {

    $stat = [];
    for ($i = 0; $i < strlen($p); $i++) {
        if (!isset($stat[$p[$i]])) $stat[$p[$i]] = 0;
        $stat[$p[$i]]++;
    }

    $left = 0;
    $right = 0;
    $match = 0;
    $window = [];

    while ($right < strlen($str)) {

        //满足长度和
        $cur = $str[$right];
        if (isset($stat[$cur])) {
            if (!isset($window[$cur])) $window[$cur] = 0;
            $window[$cur]++;

            if ($stat[$cur] == $window[$cur]) {
                $match++;
            }
        }

        while ($match == count($stat)) {
            if (($right-$left+1) == strlen($p)) {
                return true;
            }

            $leftItem = $str[$left];
            if (isset($window[$leftItem])) {

                $window[$leftItem]--;
                if ($window[$leftItem] == 0) {
                    $match--;
                }
            }
            $left++;
        }
        $right++;
    }

    return  false;
}