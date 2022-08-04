<?php
/*
Problem Statement #
Given a string, find all of its permutations preserving the character sequence but changing case.

Example 1:
Input: "ad52"
Output: "ad52", "Ad52", "aD52", "AD52"

Example 2:
Input: "ab7c"
Output: "ab7c", "Ab7c", "aB7c", "AB7c", "ab7C", "Ab7C", "aB7C", "AB7C"

 */

//$str = "ad52";
//
//var_dump(findLetterCaseStringPermutations($str));

$str = "ab7c";

var_dump(findLetterCaseStringPermutations($str));
function  findLetterCaseStringPermutations($str) {
    $path = [];
    $res = [];
    helper($str, 0, $path, $res);

    return $res;
}

function helper($str, $start, $path, &$res) {

    if (count($path) == strlen($str)) {
        $res[] = $path;
        return;
    }

    for ($i = $start; $i < strlen($str); $i++) {

        if ($i > $start) break;

        $path[] = $str[$i];
        helper($str,$i+1, $path, $res);
        array_pop($path);

        if (!is_numeric($str[$i])) {
            $path[] = strtoupper($str[$i]);
            helper($str,$i+1, $path, $res);
            array_pop($path);
        }
    }
}

function findLetterCaseStringPermutationsV1($str) {

    for ($i = 0; $i < strlen($str); $i++) {
        if (!is_numeric($str[$i])) {
            for ($j = 0; $j < strlen($str); $j++) {

            }
        }
    }
}