<?php
/*
Problem Statement #
In a non-empty array of numbers, every number appears exactly twice except two numbers that appear only once.
Find the two numbers that appear only once.

Example 1:
Input: [1, 4, 2, 1, 3, 5, 6, 2, 3, 5]
Output: [4, 6]

Example 2:
Input: [2, 1, 3, 2]
Output: [1, 3]

 */

$arr = [1, 4, 2, 1, 3, 5, 6, 2, 3, 5];
var_dump(findSingle($arr));
function findSingle($arr) {

    $res = 0;
    foreach ($arr as $index => $num) {
        $res ^= $num;
    }

    $b = 1;
    while (($res & $b) == 0 ) $b = $b << 1;

   $num1 = 0;
   $num2 = 0;
  //0100
    var_dump($b);
   foreach ($arr as $index => $item) {
       echo "num1:{$num1},num2:{$num2}, item:{$item}, b:{$b}, item&b:" .($item & $b) .PHP_EOL;
        if (($item & $b) != 0) {
            $num1 ^= $item;
        } else {
            $num2 ^= $item;
        }
   }

   return [$num1, $num2];
}