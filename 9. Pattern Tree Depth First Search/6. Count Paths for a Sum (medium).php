<?php
/*
Problem Statement #
Given a binary tree and a number ‘S’, find all paths in the tree such that the sum of all the node values of each path equals ‘S’.
 Please note that the paths can start or end at any node but all paths must follow direction from parent to child (top to bottom).
 */


class TreeNode {
    public  $val;
    public  $left;
    public  $right;

    public function __construct($val)
    {
        $this->val = $val;
    }
}

//$root = new TreeNode(1);
//$root->left = new TreeNode(7);
//$root->right = new TreeNode(9);
//$root->left->left = new TreeNode(6);
//$root->left->right = new TreeNode(5);
//$root->right->left = new TreeNode(2);
//$root->right->right = new TreeNode(3);
//
//
//var_dump(countPaths($root, 12));


//$root = new TreeNode(12);
//$root->left = new TreeNode(7);
//$root->right = new TreeNode(1);
//$root->left->left = new TreeNode(4);
////$root->left->right = new TreeNode(5);
//$root->right->left = new TreeNode(10);
//$root->right->right = new TreeNode(5);
//
//
//var_dump(countPaths($root, 11));


$root = new TreeNode(10);
$root->left = new TreeNode(5);
$root->right = new TreeNode(-3);
$root->left->left = new TreeNode(3);
$root->left->left->left = new TreeNode(3);
$root->left->left->right = new TreeNode(-2);
$root->left->right = new TreeNode(2);
$root->left->right->right = new TreeNode(1);
//$root->right->left = new TreeNode(10);
$root->right->right = new TreeNode(11);


//类似leetcode-437

var_dump(countPaths($root, 8));
function countPaths($root, $target) {
    //$preSumCount[0] = 1;//前缀和为1的路径条数为1

   // return helper($root, $target, $preSumCount, 0);

    $path = [];
    $res  = [];
    $ret =  helperV1($root, $target, $path, $res);

    var_dump($res);

    return $ret;
}

function helper($root, $target, $preSumCount,$curSum) {
    if (!$root) return 0;

    $res = 0;
    $curSum += $root->val;

    $res += $preSumCount[$curSum - $target] ?? 0;

    $preSumCount[$curSum] = ($preSumCount[$curSum] ?? 0) +1;

    $res += helper($root->left, $target, $preSumCount, $curSum);
    $res += helper($root->right, $target, $preSumCount, $curSum);

    $preSumCount[$curSum] = $preSumCount[$curSum]-1;

    return $res;
}


function helperV1($root, $target, $path, &$res) {
    if (!$root) return 0;

    $path[] = $root->val;

    $pathCount = 0;
    $pathSum = 0;


  $tmp = [];
    for ($i = count($path)-1; $i>=0; $i--) {
        $pathSum += $path[$i];
        $tmp[] = $path[$i];
        if ($pathSum == $target) {
            $res[] = $tmp;
            $pathCount++;
        }
    }

    $pathCount += helperV1($root->left, $target, $path, $res);
    $pathCount += helperV1($root->right, $target, $path, $res);

    array_pop($path);

    return  $pathCount;
}