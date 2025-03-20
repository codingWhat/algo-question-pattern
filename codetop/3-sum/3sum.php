<?php

$nums = [-4,-2,1,-5,-4,-4,4,-2,0,4,0,-2,3,1,-5,0];

var_dump(threeSum($nums));
function threeSum($nums) {

    sort($nums);

    $ret = [];
    $len = count($nums);

    //var_dump($nums);
    for ($i = 0; $i < $len; $i++) {
        $target = 0 - $nums[$i];
        $lo = $i+1;
        $hi = $len-1;
        $ret = getRet($lo, $hi, $nums, $target, $i, $ret);
//        $left = $i+1;
//        $right = $len-1;
//        $res = twoSum($nums, $left, $right, 0-$nums[$i]);
//        if (!empty($res)) {
//            foreach ($res as $item) {
//                $item[] = $nums[$i];
//                $ret[] = $item;
//            }
//        }
        while(($i+1) < $len && $nums[$i]== $nums[$i+1]) $i++;
    }
    return $ret;
}
function twoSum($nums, $left, $right, $target) {
    $ret = [];
    while ($left < $right) {
        $sum = $nums[$left] + $nums[$right];
        if ($sum == $target) {
            $ret [] =  [$nums[$left], $nums[$right]];
            while(($right-1)>$left && $nums[$right] == $nums[$right-1]) $right--;
            while(($left+1) < $right && $nums[$left] == $nums[$left+1]) $left++;
            $right--;
            $left++;
        } else if ($sum > $target) {
            while(($right-1)>$left && $nums[$right] == $nums[$right-1]) $right--;
            $right--;
        } else {
            while(($left+1) < $right && $nums[$left] == $nums[$left+1]) $left++;
            $left++;
        }
    }

    return $ret;
}

/**
 * @param int $lo
 * @param int $hi
 * @param $nums
 * @param $target
 * @param int $i
 * @param array $ret
 * @return array
 */
function getRet(int $lo, int $hi, $nums, $target, int $i, array &$ret): array
{
    while ($lo < $hi) {
        $sum = $nums[$lo] + $nums[$hi];
        if ($sum == $target) {
            $ret[] = [$nums[$i], $nums[$lo], $nums[$hi]];
            while ($lo < ($hi - 1) && $nums[$hi] == $nums[$hi - 1]) $hi--;
            while (($lo + 1) < $hi && $nums[$lo] == $nums[$lo + 1]) $lo++;
            $lo++;
            $hi--;
        } else if ($sum < $target) {
            while (($lo + 1) < $hi && $nums[$lo] == $nums[$lo + 1]) $lo++;
            $lo++;
        } else {
            while ($lo < ($hi - 1) && $nums[$hi] == $nums[$hi - 1]) $hi--;
            $hi--;
        }
    }
    return $ret;
}