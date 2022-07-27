<?php
/*
 Given a string and a list of words, find all the starting indices of substrings in the given string that are a concatenation of all the given words exactly once without any overlapping of words. It is given that all words are of the same length.

Example 1:

Input: String="catfoxcat", Words=["cat", "fox"]
Output: [0, 3]
Explanation: The two substring containing both the words are "catfox" & "foxcat".
Example 2:

Input: String="catcatfoxfox", Words=["cat", "fox"]
Output: [3]
Explanation: The only substring containing both the words is "catfox".

 */
$str = "catfoxcat";
$p = ["cat", "fox"];
var_dump(findWordConcatenation($str, $p));

$str = "catcatfoxfox";
$p = ["cat", "fox"];
var_dump(findWordConcatenation($str, $p));


function findWordConcatenation($str, $pp) {

    $need = [];
    foreach ($pp as  $p) {
        !isset($need[$p]) && $need[$p] = 0;
        $need[$p]++;
    }


    $right = 0;
    $window = [];
    $match = 0;
    $left = 0;
    $res = [];
    while ($right < strlen($str)) {
        $cur = substr($str, $right, 3);
        echo $cur. PHP_EOL;
        if (isset($need[$cur])) {
            !isset($window[$cur]) && $window[$cur] = 0;
            $window[$cur]++;
            if ($window[$cur]== $need[$cur]) {
                $match++;
            }
        }

        while ($match == count($pp)) {
            if( ($right-$left) == 3) {
                $res[] = $left;
            }

            $leftItem = substr($str, $left, 3);
            if (isset($need[$leftItem])) {
                $window[$leftItem]--;
                if ($window[$leftItem] == 0 ){
                    $match--;
                }
            }

            $left += 3;
        }

        $right += 3;
    }


    return $res;
}