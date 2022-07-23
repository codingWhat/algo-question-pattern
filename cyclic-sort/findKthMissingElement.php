<?php

/*
 Example 1:

Input: arr = [2,3,4,7,11], k = 5
Output: 9
Explanation: The missing positive integers are [1,5,6,8,9,10,12,13,...]. The 5th missing positive integer is 9.
Example 2:

Input: arr = [1,2,3,4], k = 2
Output: 6
Explanation: The missing positive integers are [5,6,7,...]. The 2nd missing positive integer is 6.
 */
$arr = [2,3,4,7,11];
$k = 5;
echo findKthPositive($arr, $k) . PHP_EOL;
$arr = [1,2,3,4];
$k = 2;
echo findKthPositive($arr, $k). PHP_EOL;
$arr = [1,4];
$k = 1;
echo findKthPositive($arr, $k). PHP_EOL;

function findKthPositive($arr, $k) {

    $left =0;
    $right = count($arr);
    while ($left < $right) {
        $mid = $left +  intval(($right-$left)/2);
        if ($arr[$mid] - $mid - 1 >= $k) {
            $right = $mid;
        } else {
          $left = $mid+1;
        }
    }

    // left/right 找到的是第一个缺失元素大于等于k的索引i
    //那么我们只需要关注i-1即可，
    //$arr[$left-1] + (k- (arr[left-1]-left-1))
    //等价于 left + $k
    return $left + $k;


//    $left = 0;
//    $right = count($arr)-1;
//
//    while ($left < $right) {
//
//        //先计算mid节点
//        // 1.mid节点左右两边缺不缺元素，左不缺，右边找，反之一样
//        // 怎么判断缺元素 arr[mid]-arr[left] == mid - left, 大于，左边缺，小于右边缺
//        // 左边缺 > k,  左边找，<k ,继续右边找
//        // 右边缺
//        $mid = $left + intval(($right-$left+1)/2);
//        $diff = ($arr[$mid]-$arr[$left]) - ($mid-$left);
//        echo "k:{$k}, mid:{$mid}, arr[$mid]:{$arr[$mid]}, arr[$left]:{$arr[$left]},  diff:{$diff}, left:{$left}, right:{$right}" . PHP_EOL;
//        if ($diff == 0 ){
//            $left = $mid;
//        } elseif ($diff > 0 ) {
//            if ($diff > $k) {
//                $right = $mid-1;
//            } else {
//                $tmp = ($arr[$mid]-$arr[$left]-1);
//                if ($tmp == $k) {
//                    break;
//                }
//                $k -= $tmp;
//                $left = $mid;
//            }
//        }
//    }
//
//    var_dump("---<<<<>>>>>",$k, $left);
//    return $arr[$left]+$k;
}
