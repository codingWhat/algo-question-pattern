<?php
/**
We are given an unsorted array containing numbers taken from the range 1 to ‘n’. The array can have duplicates, which means some numbers will be missing. Find all those missing numbers.

Example 1:
Input: [2, 3, 1, 8, 2, 3, 5, 1]
Output: 4, 6, 7
Explanation: The array should have all numbers from 1 to 8, due to duplicates 4, 6, and 7 are missing.

Example 2:
Input: [2, 4, 1, 2]
Output: 3

Example 3:
Input: [2, 3, 2, 1]
Output: 4
 */

$arr = [2, 3, 1, 8, 2, 3, 5, 1];
echo "get:" . findAllMissingNumbers($arr) . ", want:4,6,7" . PHP_EOL;
$arr = [2, 4, 1, 2];
echo "get:" . findAllMissingNumbers($arr) . ", want:3" . PHP_EOL;
$arr = [2, 3, 2, 1];
echo "get:" . findAllMissingNumbers($arr) . ", want:4" . PHP_EOL;
//
function findAllMissingNumbers($arr) {

    for ($i = 0; $i < count($arr); $i++) {
        $curId = $i;
        $targetIdx = $arr[$i]-1;
        while ($arr[$targetIdx] != $arr[$curId]) {
            $tmp = $arr[$targetIdx];
            $arr[$targetIdx] = $arr[$i];
            $arr[$i] = $tmp;

            $targetIdx = $arr[$curId]-1;
        }
    }

   // var_dump($arr);

    $res = [];
    for ($i = 0; $i < count($arr); $i++) {
        if (($i+1) != $arr[$i] ) {
            $res[] = $i+1;
        }
    }

    return implode(",", $res);

}

/*function findAllMissingNumbers($arr) {

     for ($i = 0; $i < count($arr); $i++) {
           $curIdx = $i;
           $curVal = $arr[$curIdx];
           $targetIdx = $curVal-1;
           $targetVal = $arr[$targetIdx];
           echo "curIdx:{$curIdx}, curVal:{$curVal}, targetIdx:{$targetIdx}, targetVal:{$targetVal}, arr:". json_encode($arr) . PHP_EOL;
           if ($curVal != $targetVal) {
               swap($arr, $curIdx, $targetIdx);
           }
     }

   $res = [];
   for ($i = 0; $i < count($arr); $i++) {
       if ($arr[$i] != $i+1) {
           $res[] = $i+1;
       }
   }

   return implode(",", $res);
}

function swap (&$arr, $i, $j)  {
    $tmp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $tmp;
}*/