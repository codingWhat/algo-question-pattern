<?php

/**
 * A sequence of consecutive integers 1,2,3,4,5,6,7,...,n
2,3
1,2,3,5
1,3,4,5,6,7,8
 */

$arr = [2,3];
echo "get:" . findAllMissingNumbers($arr) . ", want:1" . PHP_EOL;
$arr = [1,2,3,5];
echo "get:" . findAllMissingNumbers($arr) . ", want:4" . PHP_EOL;
//$arr = [1,3,4,5,6,7,8];
//echo "get:" . findAllMissingNumbers($arr) . ", want:2" . PHP_EOL;
//$arr = [1,2,3];
//echo "get:" . findAllMissingNumbers($arr) . ", want:-1" . PHP_EOL;
//$arr = [1,3,8];
//echo "get:" . findAllMissingNumbersAll($arr) . ", want:2,4,5,6,7" . PHP_EOL;
//$arr = [1,8];
//echo "get:" . findAllMissingNumbersAll($arr) . ", want:2,3,4,5,6,7" . PHP_EOL;
function findAllMissingNumbers($arr) {
//    for ($i = 0; $i < count($arr); $i++) {
//        if ($i+1 != $arr[$i]) {
//            return $i+1;
//        }
//    }
//
//    return -1;

    $left = 0;
    $right = count($arr)-1;
    while ($left < $right) {
        $mid = $left + intval(($right-$left)/2);
        if ($arr[$mid] > $mid+1 ) {
            $right = $mid;
        } else {
            $left = $mid + 1;
        }
    }

    return $arr[$left]-1;


//    $left = 0;
//    $right = count($arr)-1;
//    while ($left < $right) {
//        $mid = $left+ intval(($right-$left)/2);
//        if ($arr[$mid] == $mid+1) {
//            $left = $mid+1;
//        } else {
//            $right = $mid;
//        }
//    }
//    if ($arr[$left] != $left+1)  {
//        return $left+1;
//    } else {
//        return -1;
//    }
}

function findAllMissingNumbersAll($arr) {
    //如果知道最大值，也可以for循环遍历
//    for ($i = 0; $i < $max; $i++) {
//        if (in_array($i+1, $arr)) {
//            $res[] = $i+1;
//        }
//    }
//
//    return $res;


    $i = 0;
   $res = [];
   $k = 0;
   while ($i < count($arr)) {
       if ($arr[$i] == $k+1) {
           $i++;
       } else {
           $res[] = $k+1;
       }
       $k++;
   }

   return implode(",", $res);
}