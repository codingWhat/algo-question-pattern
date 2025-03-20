<?php

//$arr = [5,1,4,3,2];
//$arr = [5,2,3,1];
//
//$pivot = $arr[0];
//
//// 【left+1, right】
//// [left+1, i) <= pivot
//// (j ,right] > pivot
//$left = 0;
//$right = count($arr)-1;
//$k = $left +1;
//$i = $left+1;
//$j = $right;
//
//
//while ($k < $j) {
//
//    if ($arr[$k] <= $pivot) {
//        swap($arr, $i, $k);
//        $i++;
//    } else {
//        swap($arr, $j, $k);
//        $j--;
//    }
//    echo "t--->{$i}, {$j}" . json_encode($arr) . PHP_EOL;
//    $k++;
//}
//
//swap($arr, $left, $j);
//
//var_dump($arr);
//
//function swap(&$arr, $i, $j) {
//    $tmp = $arr[$i];
//    $arr[$i] = $arr[$j];
//    $arr[$j]  = $tmp;
//}


$arr = [3,5,6,7];
singleNumber($arr);
function singleNumber($arr) {

    $x1 = 0;
    foreach ($arr as $item) {
        $x1 ^= $item;
    }

    var_dump($x1);
}