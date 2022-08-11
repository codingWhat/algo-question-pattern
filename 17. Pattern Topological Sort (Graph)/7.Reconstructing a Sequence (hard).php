<?php
/*
Reconstructing a Sequence (hard) #
Given a sequence originalSeq and an array of sequences,
write a method to find if originalSeq can be uniquely reconstructed from the array of sequences.

Unique reconstruction means that we need to find if originalSeq is the only sequence
such that all sequences in the array are subsequences of it.

Example 1:
Input: originalSeq: [1, 2, 3, 4], seqs: [[1, 2], [2, 3], [3, 4]]
Output: true
Explanation: The sequences [1, 2], [2, 3], and [3, 4] can uniquely reconstruct
[1, 2, 3, 4], in other words, all the given sequences uniquely define the order of numbers
in the 'originalSeq'.

Example 2:
Input: originalSeq: [1, 2, 3, 4], seqs: [[1, 2], [2, 3], [2, 4]]
Output: false
Explanation: The sequences [1, 2], [2, 3], and [2, 4] cannot uniquely reconstruct
[1, 2, 3, 4]. There are two possible sequences we can construct from the given sequences:
1) [1, 2, 3, 4]
2) [1, 2, 4, 3]

Example 3:
Input: originalSeq: [3, 1, 4, 2, 5], seqs: [[3, 1, 5], [1, 4, 2, 5]]
Output: true
Explanation: The sequences [3, 1, 5] and [1, 4, 2, 5] can uniquely reconstruct
[3, 1, 4, 2, 5].
 */
$oriSeq = [1, 2, 3, 4];
$seqs = [[1, 2], [2, 3], [3, 4]];

$oriSeq = [1, 2, 3, 4];
$seqs = [[1, 2], [2, 3], [2, 4]];

$oriSeq = [3, 1, 4, 2, 5];
$seqs = [[3, 1, 5], [1, 4, 2, 5]];

var_dump(canReconstruct($oriSeq, $seqs));
function canReconstruct($oriSeq, $seqs) {

    $next = [];
    $inDegree = [];
    foreach ($seqs as $index => $seq) {
        for($i = 1; $i < count($seq); $i++) {

            !isset($inDegree[$seq[$i]]) &&  $inDegree[$seq[$i]] =0;
            !isset($inDegree[$seq[$i-1]]) &&  $inDegree[$seq[$i-1]] =0;
            $inDegree[$seq[$i]]++;
            $next[$seq[$i-1]][] = $seq[$i];

        }
    }

    $queue = [];
    foreach ($inDegree as $item => $num) {
        if ($num == 0) {
            $queue[] = $item;
        }
    }

    $ret = [];
    while (!empty($queue)) {
        $num = array_shift($queue);
        echo "num: $num" . PHP_EOL;
        $ret[] = $num;
        if(!isset($next[$num])) {
            if (count($ret) != count($oriSeq)) {
                array_pop($ret);
                continue;
            } else {
                return  true;
            }
        }

        foreach ($next[$num] as $index => $child) {
            $inDegree[$child]--;
            if ($inDegree[$child] == 0) {
                $queue[] = $child;
            }
        }
    }

    return count($ret) == count($oriSeq);
}