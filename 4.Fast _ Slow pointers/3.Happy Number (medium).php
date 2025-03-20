<?php
/*
Any number will be called a happy number if, after repeatedly replacing it with a number equal to the sum of the square of all of its digits, leads us to number ‘1’. All other (not-happy) numbers will never reach ‘1’. Instead, they will be stuck in a cycle of numbers which does not include ‘1’.

Example 1:
Input: 23
Output: true (23 is a happy number)
Explanations: Here are the steps to find out that 23 is a happy number:

Example 2:
Input: 12
Output: false (12 is not a happy number)
Explanations: Here are the steps to find out that 12 is not a happy number:
 */

//var_dump(findHappyNum(23));
//var_dump(findHappyNum(12));
//var_dump(findHappyNum(19));


var_dump(findHappyNumV1(23));
var_dump(findHappyNumV1(12));
var_dump(findHappyNumV1(19));

function findHappyNumV1($num) {
    //时间复杂度:O
    $slow = $fast = $num;
   do {
       $slow  = getSum($slow);
       $fast = getSum($fast);
       $fast = getSum($fast);
   } while($slow != $fast);

   return $slow == 1;
}

function findHappyNum($num) {

    $h = [];
    while (true) {
        $s = getSum($num);
        if ($s == 1) {
            return true;
        }
        if (isset($h[$s])) return false;

        !isset($h[$s]) && $h[$s] = 1;

        $num = $s;
    }
}

function getSum($num) {
    $sum  = 0;
    while ($num > 0) {
        $sum += ($num%10) * ($num%10);
        $num = intval($num/10);
    }

    return $sum;
}