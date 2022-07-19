<?php

/*

String Anagrams (hard) #
Given a string and a pattern, find all anagrams of the pattern in the given string.

Anagram is actually a Permutation of a string. For example, “abc” has the following six anagrams:

abc
acb
bac
bca
cab
cba
Write a function to return a list of starting indices of the anagrams of the pattern in the given string.

Example 1:

Input: String="ppqp", Pattern="pq"
Output: [1, 2]
Explanation: The two anagrams of the pattern in the given string are "pq" and "qp".
Example 2:

Input: String="abbcabc", Pattern="abc"
Output: [2, 3, 4]
Explanation: The three anagrams of the pattern in the given string are "bca", "cab", and "abc".

*/

$str = "ppqp";
$p = "pq";
var_dump(isAnagrams($str, $p));

$str = "abbcabc";
$p = "abc";
var_dump(isAnagrams($str, $p));

function isAnagrams($str, $p): array
{

    $need = [];
    for($i = 0; $i < strlen($p); $i++) {
        if (!isset($need[$p[$i]])) $need[$p[$i]] = 0;
        $need[$p[$i]]++;
    }


    $left = 0;
    $right = 0;
    $window = [];
    $match = 0;
    while ($right <  strlen($str)) {
        $cur = $str[$right];
        if (isset($need[$cur])) {
            if (!isset($window[$cur]))$window[$cur] = 0;
            $window[$cur]++;
            if ($window[$cur] == $need[$cur]) {
                $match++;
            }
        }


        while ($match == count($need)) {

            if (($right-$left+1) == strlen($p)) {

                $tmp = [];
                for ($i = $left; $i <= $right; $i++) {
                    $tmp[] = $i;
                }
                return $tmp;
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

    return [];
}
