<?php
/*
Problem Statement #
There is a dictionary containing words from an alien language for which we don’t know the ordering of the characters.
Write a method to find the correct order of characters in the alien language.

Example 1:
Input: Words: ["ba", "bc", "ac", "cab"]
Output: bac
Explanation: Given that the words are sorted lexicographically by the rules of the alien language, so
from the given words we can conclude the following ordering among its characters:

1. From "ba" and "bc", we can conclude that 'a' comes before 'c'.
2. From "bc" and "ac", we can conclude that 'b' comes before 'a'

From the above two points, we can conclude that the correct character order is: "bac"

Example 2:
Input: Words: ["cab", "aaa", "aab"]
Output: cab
Explanation: From the given words we can conclude the following ordering among its characters:

1. From "cab" and "aaa", we can conclude that 'c' comes before 'a'.
2. From "aaa" and "aab", we can conclude that 'a' comes before 'b'

From the above two points, we can conclude that the correct character order is: "cab"

Example 3:
Input: Words: ["ywx", "wz", "xww", "xz", "zyy", "zwz"]
Output: ywxz
Explanation: From the given words we can conclude the following ordering among its characters:
1. From "ywx" and "wz", we can conclude that 'y' comes before 'w'.
2. From "wz" and "xww", we can conclude that 'w' comes before 'x'.
3. From "xww" and "xz", we can conclude that 'w' comes before 'z'
4. From "xz" and "zyy", we can conclude that 'x' comes before 'z'
5. From "zyy" and "zwz", we can conclude that 'y' comes before 'w'

From the above five points, we can conclude that the correct character order is: "ywxz"
 */
//时间复杂度: O(V+E) //极端情况 O(N) 单次个数
//空间复杂度: O(V+N) 所有字符的next和inDegree

$words = ["ba", "bc", "ac", "cab"];
//$words = ["ywx", "wz", "xww", "xz", "zyy", "zwz"];
//$words = ["cab", "aaa", "aab"];
var_dump(findOrderOfCharacter($words));
function findOrderOfCharacter($words) {

    $inDegree = [];
    $next = [];
    foreach ($words as  $word) {
        for($i = 0; $i < strlen($word); $i++) {
            !isset($inDegree[$word[$i]]) && $inDegree[$word[$i]] = 0;
            !isset($next[$word[$i]]) && $next[$word[$i]] = [];
        }
    }

    for($i = 1; $i < count($words); $i++) {
        $w1 = $words[$i-1];
        $w2 = $words[$i];
        $j = 0;
        while ($j < min(strlen($w1), strlen($w2)))  {
            $p = $w1[$j];
            $s = $w2[$j];
            if ($p != $s) {
                $next[$p][] = $s;
                $inDegree[$s]++;
                break;
            }
            $j++;
        }
    }

//    for ($i = 0; $i < count($words)-1; $i++) {
//        $w1 = $words[$i];
//        $w2 = $words[$i+1];
//        for ($j = 0; $j < min(strlen($w1), strlen($w2)); $j++) {
//            $p  = $w1[$j];
//            $s = $w2[$j];
//            if ($p != $s) {
//                $next[$p][] = $s;
//                $inDegree[$s]++;
//                break;
//            }
//        }
//    }

    $queue = [];
    foreach ($inDegree as $ch => $num) {
        if ($num == 0) {
            $queue[] = $ch;
        }
    }


    $ret = "";
    while (!empty($queue)) {
        $ch = array_shift($queue);
        $ret.= $ch;
        if(!isset($next[$ch])) continue;
        foreach ($next[$ch] as $index => $child) {
            $inDegree[$child]--;
            if ($inDegree[$child] == 0) {
                $queue[] = $child;
            }
        }
    }

    if (strlen($ret) != count($inDegree)) return  "";

    return $ret;
}