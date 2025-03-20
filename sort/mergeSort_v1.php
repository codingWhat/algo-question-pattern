<?php

//归并排序:
//空间复杂度: O(1)
//时间复杂度: NLogN
$arr = [2,1,3,4];
$arr = [6,2,1,5,3,7,4,8];

mergeSortV1($arr);
function mergeSortV1($arr) {
    $tmp = [];
    helperV1($arr, 0, count($arr)-1, $tmp);
    var_dump($arr);
}
function helperV1(&$arr, $left, $right, &$tmp) {
    if ($left >= $right) return;

    $mid = intval(($left+$right)/2);
    helperV1($arr, $left, $mid, $tmp);
    helperV1($arr, $mid+1, $right, $tmp);

    mergeV1($arr, $left, $mid, $right, $tmp);
}

function mergeV1(&$arr, $left, $mid, $right, &$tmp) {

    for ($i = $left; $i <= $right; $i++) {
        $tmp[$i] = $arr[$i];
    }

    $i = $left;
    $j = $mid+1;

    for ($k = $left; $k <= $right; $k++) {
        if ($i == $mid+1) {
            $arr[$k] = $tmp[$j];
            $j++;
        } else if ($j == $right+1) {
            $arr[$k] = $tmp[$i];
            $i++;
        }else if ($tmp[$i] > $tmp[$j]) {
            $arr[$k] = $tmp[$j];
            $j++;
        } else {
            $arr[$k] = $tmp[$i];
            $i++;
        }
    }
}


