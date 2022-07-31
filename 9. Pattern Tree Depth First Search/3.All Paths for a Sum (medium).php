<?php
/*
 Problem Statement #
Given a binary tree and a number ‘S’,
find all paths from root-to-leaf such that the sum of all the node values of each path equals ‘S’.
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

$root = new TreeNode(1);
$root->left = new TreeNode(7);
$root->right = new TreeNode(9);
$root->left->left = new TreeNode(4);
$root->left->right = new TreeNode(5);
$root->right->left = new TreeNode(2);
$root->right->right = new TreeNode(7);

var_dump(findPaths($root, 12));


$root = new TreeNode(12);
$root->left = new TreeNode(7);
$root->right = new TreeNode(1);
$root->left->left = new TreeNode(4);
//$root->left->right = new TreeNode(5);
$root->right->left = new TreeNode(10);
$root->right->right = new TreeNode(5);

var_dump(findPaths($root, 23));

function findPaths($root, $sum) {
        $ret = 0;
        helper($root, $sum, $ret);
        return $ret;
}

function helper($root, $sum, &$ret) {
    if (!$root) {
        return;
    }

    if ($sum < 0) {
        return;
    }

    //因为之前有!$root判断，会走不到$sum == 0逻辑
    if ($sum-($root->val) == 0) {

        $ret++;
        return;
    }


    helper($root->left, $sum-$root->val, $ret);
    helper($root->right, $sum-$root->val, $ret);
}


function  findAllPaths($root) {
    $path = [];
    $ret = [];
    helperV1($root, $path, $ret);

    return $ret;
}

function helperV1($root,  $path, &$ret) {

    $path[] = $root->val;
    if (!$root->left && !$root->right) {
        $ret[] = $path;
        return;
    }

    helper($root->left,  $path, $ret);
    helper($root->right, $path, $ret);

    array_pop($path);
}