<?php
/*
 Comparing Strings containing Backspaces (medium) #
Given two strings containing backspaces (identified by the character ‘#’), check if the two strings are equal.

Example 1:

Input: str1="xy#z", str2="xzz#"
Output: true
Explanation: After applying backspaces the strings become "xz" and "xz" respectively.
Example 2:

Input: str1="xy#z", str2="xy#z"
Output: false
Explanation: After applying backspaces the strings become "xz" and "xy" respectively.

Example 3:
Input: str1="xp#", str2="xyz##"
Output: true
Explanation: After applying backspaces the strings become "x" and "x" respectively.
In "xyz##", the first '#' removes the character 'z' and the second '#' removes the character 'y'.
Example 4:

Input: str1="xywrrmp", str2="xywrrmu#p"
Output: true
Explanation: After applying backspaces the strings become "xywrrmp" and "xywrrmp" respectively.
 */
//$str1 = "xy#z";
//$str2 = "xzz#";
//var_dump(backspaceCompare($str1, $str2));

//时间复杂度: O(n) + O(s)
//空间复杂度: O(1)

//"ab##"
//"c#d#"
$str1 = "ab##";
$str2 = "c#d#";
var_dump(backspaceCompare($str1, $str2));


function backspaceCompare($str1, $str2) {

    $i = strlen($str1)-1;
    $j = strlen($str2)-1;

    while ($i >= 0 || $j >= 0) {

        $i = findIdx($str1, $i);
        $j = findIdx($str2, $j);
        echo "---> i:{$i}, j:{$j}" . PHP_EOL;
        if ($i < 0 && $j < 0) return  true;

        if ($i < 0 || $j < 0) return false;

        if ($str1[$i] != $str2[$j]) return  false;

        $i--;
        $j--;
    }

    return  true;
}

function findIdx($str, $i) {

    $backSpace = 0;
    while ($i >= 0) {
        if ($str[$i] == "#") {
            $backSpace++;
        } else if ($backSpace > 0) {
            $backSpace--;
        } else {
            break;
        }
        $i--;
    }

    return $i;
}