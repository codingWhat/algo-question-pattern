<?php
$s1 = "abcde";
$s2 = "ace";


var_dump(getLcs($s1, $s2));
function getLcs($s1, $s2) {
    $dp = array_fill(0,strlen($s1)+1, array_fill(0, strlen($s2)+1, 0));

    for ($i = 1; $i <= strlen($s1); $i++) {
        for ($j = 1; $j <= strlen($s2); $j++) {
            if ($s1[$i-1] == $s2[$j-1]) {
                $dp[$i][$j] = 1 + $dp[$i-1][$j-1];
            } else {
                $dp[$i][$j] = max($dp[$i-1][$j], $dp[$i][$j-1]);
            }

            echo  "i:" . ($i-1). ", s1[i]: {$s1[$i-1]}, j: ".($j-1)." s2[j]:{$s2[$j-1]}--->" .$dp[$i][$j] . PHP_EOL;
        }
    }
//var_dump($dp);
    //return $dp[-1][-1];
}