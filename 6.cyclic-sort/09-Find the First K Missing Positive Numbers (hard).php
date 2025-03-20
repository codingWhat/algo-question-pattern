<?php

/**
Given an unsorted array containing numbers and a number ‘k’, find the first ‘k’ missing positive numbers in the array.

Example 1:
Input: [3, -1, 4, 5, 5], k=3
Output: [1, 2, 6]
Explanation: The smallest missing positive numbers are 1, 2 and 6.

Example 2:
Input: [2, 3, 4], k=3
Output: [1, 5, 6]
Explanation: The smallest missing positive numbers are 1, 5 and 6.

Example 3:
Input: [-2, -3, 4], k=2
Output: [1, 2]
Explanation: The smallest missing positive numbers are 1 and 2.
 */

$arr = [3, -1, 4, 5, 5];
$k = 3;
echo "get:" . findKMissingNumbers($arr, $k). ", want:[1, 2, 6]" . PHP_EOL;


$arr = [2, 3, 4];
$k = 3;
echo "get:" . findKMissingNumbers($arr, $k). ", want:[1, 5, 6]" . PHP_EOL;


$arr = [-2, -3, 4];
$k = 2;
echo "get:" . findKMissingNumbers($arr, $k). ", want:[1, 2]" . PHP_EOL;


$arr = [2, 1, 3, 6, 5];
$k = 2;
echo "get:" . findKMissingNumbers($arr, $k). ", want:[4, 7]" . PHP_EOL;



function findKMissingNumbers($arr, $k) {

    for ($i = 0; $i < count($arr); $i++) {
        while ($arr[$i] > 0 && $arr[$i] <= count($arr) && $arr[$i] != $arr[$arr[$i]-1]) {
            swap($arr, $i, $arr[$i]-1);
        }
    }

  $res = [];
  $extraNumbers = [];
   for ($i = 0; $i < count($arr) && count($res)  < $k; $i++) {
       if ($arr[$i] != $i+1) {
           $res[] = $i+1;
           $extraNumbers[$arr[$i]] = 1;
       }
   }

   for ($i = 1; count($res) < $k; $i++) {
       $candidateNum = $i + count($arr);
       if (!isset($extraNumbers[$candidateNum])) {
           $res[] = $candidateNum;
       }
   }

   return implode(",", $res);
}

function swap (&$arr, $i, $j)  {
    $tmp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $tmp;
}