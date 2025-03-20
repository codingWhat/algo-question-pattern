<?php
/*

Smallest Window containing Substring (hard) #
Given a string and a pattern, find the smallest substring in the given string which has all the characters of the given pattern.

Example 1:

Input: String="aabdec", Pattern="abc"
Output: "abdec"
Explanation: The smallest substring having all characters of the pattern is "abdec"
Example 2:

Input: String="abdabca", Pattern="abc"
Output: "abc"
Explanation: The smallest substring having all characters of the pattern is "abc".
Example 3:

Input: String="adcad", Pattern="abc"
Output: ""
Explanation: No substring in the given string has all characters of the pattern.

 */

$str = "aabdec";
$p = "abc";
echo findSmallestString($str, $p) . PHP_EOL;


$str = "abdabca";
$p = "abc";
echo findSmallestString($str, $p) . PHP_EOL;


$str = "adcad";
$p = "abc";
echo findSmallestString($str, $p) . PHP_EOL;

function findSmallestString($str, $p) {

    $need = [];
    for ($i = 0; $i < strlen($p); $i++) {
        if (!isset($need[$p[$i]]))$need[$p[$i]] = 0;
        $need[$p[$i]]++;
    }

    $left = 0;
    $right = 0;
    $l = strlen($str);
    $window = [];
    $match = 0;
    $minLen = PHP_INT_MAX;
    $res = "";
    while ($right < $l) {
         $cur = $str[$right];

         if  (isset($need[$cur])) {
             !isset($window[$cur]) && $window[$cur] = 0;
              $window[$cur]++;
              if ($window[$cur] == $need[$cur]) {
                  $match++;
              }
         }

         while ($match == count($need)) {

             if (($right-$left+1) < $minLen) {
                 $res =  substr($str, $left, $right+1);
             }

             $leftItem = $str[$left];
             if (isset($need[$leftItem])) {
                 $window[$leftItem]--;
                 if ($window[$leftItem] == 0) {
                     $match--;
                 }
             }

             $left++;
         }


        $right++;
    }


    return $res;

}