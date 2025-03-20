<?php


//class AA {
//    function numberOfSubarrays($nums, $k) {
//
//        $stat = [];
//        $oddNum = 0;
//        $count = 0;
//        for($i = 0; $i < count($nums); $i++) {
//            $oddNum += $nums[$i] & 1;
//            if (isset($stat[$oddNum-$k])) {
//                $count += $stat[$oddNum-$k];
//            }
//
//            !isset($stat[$oddNum]) && $stat[$oddNum] = 0;
//            $stat[$oddNum]++;
//        }
//
//        return $count;
//    }
//}
//
//$obj = new AA();
//$nums = [1,2,3];
//$k =  3;
//var_dump($obj->numberOfSubarrays($nums, $k));



class MyMinHeap extends SplMinHeap {

    public function compare($item1, $item2) : int {
      //  echo "===>" . json_encode($item1) . ", ==>" . json_encode($item2) . "==>top" . json_encode($this->top()) . PHP_EOL;
        if ($item1[1] == $item2[1]) {
            var_dump($item1[0] , $item2[0]);
            var_dump($item1[0] < $item2[0]);
            return $item1[0] < $item2[0] ? 1 : -1;
        }

        return $item2[1] > $item1[1]  ? 1: -1;
    }
}


function helperV3($nums, $k, $bucketSum, $idx, $used, $eachBucketNum) {
    if ($k == 0) return true; //说明所有桶找到了

    if ($bucketSum == $eachBucketNum) {
        //这个桶找到,去找下一个桶
        $res = $this->helperV3($nums, $k-1, 0, 0, $used, $eachBucketNum);
        $this->memo[$used] = $res;
        return $res;
    }

    if ($this->memo[$used]) {
        return $this->memo[$used];
    }
    for ($i = $idx; $i < count($nums); $i++) {

            if ((($used >> $i) & 1) == 1) continue;
            if (($bucketSum + $nums[$i]) > $eachBucketNum) continue;

            $bucketSum += $nums[$i];
            $used |= 1 << $i;
            if ($this->helperV3($nums, $k, $bucketSum, $i+1, $used, $eachBucketNum)) return true;
            $bucketSum -= $nums[$i];
            $used ^= 1 << $i;
        }

    return false;
}