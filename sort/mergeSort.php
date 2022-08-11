<?php

//归并排序:
//空间复杂度: O(1)
//时间复杂度: NLogN
$arr = [2,1,3,4];
$arr = [6,2,1,5,3,7,4,8];

mergeSort($arr);
function mergeSort($arr) {
    $max = max($arr)+1;
    helper($arr, 0, count($arr)-1, $max);
    var_dump($arr);
}
function helper(&$arr, $left, $right, $max) {
    if ($left >= $right) return;

    $mid = intval(($left+$right)/2);
    helper($arr, $left, $mid, $max);
    helper($arr, $mid+1, $right, $max);

    merge($arr, $left, $mid, $right, $max);
}

function merge(&$arr, $left, $mid, $right, $max) {

    $j = $mid+1;
    $k = $left;
    $i = $left;

    while ($i <= $mid && $j <= $right) {
        echo "left:{$left}, right:{$right}, arr[i]: {$arr[$i]}, arr[j]:{$arr[$j]}, arr:". json_encode($arr) . PHP_EOL;
        if(($arr[$i]%$max) <= ($arr[$j]%$max)) {
            $arr[$k] = $arr[$k] + ($arr[$i]%$max)*$max;
            $k++;
            $i++;
        } else {
            $arr[$k] = $arr[$k] + ($arr[$j]%$max)*$max;
            $k++;
            $j++;
        }
    }

    while ($i <= $mid) {
        $arr[$k] = $arr[$k] + ($arr[$i]%$max)*$max;
        $k++;
        $i++;
    }

    while ($j <= $right) {
        $arr[$k] = $arr[$k] + ($arr[$j]%$max)*$max;
        $k++;
        $j++;
    }

    for ($i = $left; $i <= $right; $i++) {
        $arr[$i] = intval($arr[$i]/$max);
    }

    echo "left:{$left}, mid:{$mid}, right:{$right}. arr:" . json_encode($arr) . PHP_EOL;
}