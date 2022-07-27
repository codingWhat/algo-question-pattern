<?php
/*

Given an array of unsorted numbers and a target number, find all unique quadruplets in it, whose sum is equal to the target number.

Example 1:
Input: [4, 1, 2, -1, 1, -3], target=1
Output: [-3, -1, 1, 4], [-3, 1, 1, 2]
Explanation: Both the quadruplets add up to the target.

Example 2:
Input: [2, 0, -1, 1, -2, 2], target=2
[-2, -1,0,1,2,2]
Output: [-2, 0, 2, 2], [-1, 0, 1, 2]
Explanation: Both the quadruplets add up to the target.
 */
/*
$arr = [4, 1, 2, -1, 1, -3];
$target = 1;

var_dump(searchQuadruplets($arr, $target));*/


//$arr = [2, 0, -1, 1, -2, 2];
//$target = 2;
//
//var_dump(searchQuadruplets($arr, $target));

$arr = [2,2,2,2,2];
$target = 8;

var_dump(searchQuadruplets($arr, $target));

function  searchQuadruplets($arr, $target) {
    sort($arr);
   return  helper($arr, 0, count($arr)-1, $target, 4);
}

function helper($arr, $left, $right, $target, $num) {
    if ($num < 2) {
        return  [];
    }

    $ret = [];
    if ($num > 2) {
        for ($i = $left; $i < $right; $i++) {
            $tmpRet=  helper($arr, $i+1, $right, $target-$arr[$i], $num-1);
            foreach ($tmpRet as $item) {
                $item[] = $arr[$i];
                $ret[] = $item;
            }

            while ($i < $right-1 && $arr[$i] == $arr[$i+1]) $i++;
        }
        return  $ret;
    }


    while ($left < $right) {
        $sum = $arr[$left] + $arr[$right];
        if ($sum > $target) {
            while ($right > 1 && $arr[$right]== $arr[$right-1]) $right--;
        } else if ($sum < $target) {
            while ($left < $right-1 && $arr[$left]== $arr[$left+1]) $left++;
        } else {

            $ret[] = [$arr[$left], $arr[$right]];
            while ($left < $right-1 && $arr[$left]== $arr[$left+1]) $left++;
            while ($right > 1 && $arr[$right]== $arr[$right-1]) $right--;

            $left++;
            $right--;
        }
    }

    return $ret;

}