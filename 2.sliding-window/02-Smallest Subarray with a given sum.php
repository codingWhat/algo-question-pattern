<?php
/*
 Given an array of positive numbers and a positive number ‘S’,
 find the length of the smallest contiguous subarray whose sum is greater than or equal to ‘S’. Return 0, if no such subarray exists.

Example 1:

Input: [2, 1, 5, 2, 3, 2], S=7
Output: 2
Explanation: The smallest subarray with a sum great than or equal to '7' is [5, 2].
Example 2:

Input: [2, 1, 5, 2, 8], S=7
Output: 1
Explanation: The smallest subarray with a sum greater than or equal to '7' is [8].
Example 3:

Input: [3, 4, 1, 1, 6], S=8
Output: 3
Explanation: Smallest subarrays with a sum greater than or equal to '8' are [3, 4, 1] or [1, 1, 6].
 */
//$arr = [2, 1, 5, 2, 3, 2];
//$s = 7;
//echo "get:" . getMinLenArr($arr, $s) . ", want:2" . PHP_EOL;
//
//$arr = [2, 1, 5, 2, 8];
//$s = 7;
//echo "get:" . getMinLenArr($arr, $s) . ", want:1" . PHP_EOL;
//
//$arr = [3, 4, 1, 1, 6];
//$s = 8;
//echo "get:" . getMinLenArr($arr, $s) . ", want:3". PHP_EOL;
//
//
//$arr = [2, 1, 5, 2, 3, 2];
//$s = 7;
//var_dump(getMinLenArrV1($arr, $s));
//$arr = [2, 1, 5, 2, 8];
//$s = 7;
//var_dump(getMinLenArrV1($arr, $s));
//$arr = [3, 4, 1, 1, 6];
//$s = 8;
//var_dump(getMinLenArrV1($arr, $s));
//
//function getMinLenArrV1($arr, $s) {
//    $right = 0;
//    $left = 0;
//    $sum = 0;
//    $minLen = PHP_INT_MAX;
//    while ($right < count($arr)) {
//
//        $sum += $arr[$right];
//        while ($sum >= $s) {
//            $minLen = min($minLen, $right-$left+1);
//            $sum -= $arr[$left];
//            $left++;
//        }
//
//        $right++;
//    }
//
//    return $minLen;
//}
//
//function getMinLenArr($arr, $s) {
//    $start = 0;
//    $sum = 0;
//    $res = PHP_INT_MAX;
//    for ($end = 0; $end < count($arr); $end++) {
//        $sum += $arr[$end];
//        while ($sum >= $s) {
//            $res = min($res, $end-$start+1);
//            $sum -= $arr[$start];
//            $start++;
//        }
//    }
//
//    return $res;
//}


function longestIncreasingSubsequence($nums) {
    $n = count($nums);
    $dp = array_fill(0, $n, 1);

    $max_length = 1;

    for ($i = 1; $i < $n; $i++) {
        for ($j = 0 ; $j < $i; $j++) {
            if ($nums[$i] < $nums[$j]) {
                $dp[$i] = max($dp[$i], $dp[$j]+1);
            }
        }
    }

    for ($i = 0; $i < $n; $i++) {
        $max_length = max($max_length, $dp[$i]);
    }

    return $max_length;
}

$nums = [10, 9, 2, 5, 3, 7, 101, 18];
echo longestIncreasingSubsequence($nums); // 输出 4

function longestSeq($nums)
{
    $len = count($nums);
    $dp = array_fill(0, $len, 1);
    //$nums = [10,9,2,5,3,7,101,18];
    $maxLen = 0;
    for($i = 1; $i < $len; $i++) {
      //  echo  "{$i}:". json_encode($dp) . PHP_EOL;
        $max = $dp[$i];
        for ($j = $i-1; $j >= 0; $j--) {
            if ($nums[$i] > $nums[$j]) {
                if ($dp[$j] >= $max) {
                    $max = $dp[$j] +1;
                }
            }
        }
        $dp[$i] = $max;
        $maxLen = max($maxLen, $max);
      //  echo "{$i}===>:" . json_encode($dp) . PHP_EOL;
    }
//var_dump($dp);
//    $maxLen = 0;
//    for($i = 0; $i < $len; $i++) {
//        $maxLen = max($maxLen, $dp[$i]);
//    }
    var_dump($maxLen);
    return $maxLen;

}

$nums = [10,9,2,5,3,7,101,18];
longestSeq($nums);