<?php
/*
 Problem Statement #
Given a binary tree and a number ‘S’,
find if the tree has a path from root-to-leaf such that the sum of all the node values of that path equals ‘S’.

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

$root = new TreeNode(12);
$root->left = new TreeNode(7);
$root->right = new TreeNode(1);
//$root->left->left = new TreeNode(12);
$root->left->right = new TreeNode(9);
$root->right->left = new TreeNode(10);
$root->right->right = new TreeNode(5);

var_dump(hasPath($root, 23));
var_dump(hasPath($root, 16));


function hasPath($root, $sum) {
    $ret =  false;
    helper($root, $sum, $ret);
    return $ret;
}

function helper($root, $sum, &$ret) {
    if (!$root) {
        return;
    }
    if ($ret) {
        return;
    }

    if ($sum < 0) {
        return;
    }

    //因为之前有!$root判断，会走不到$sum == 0逻辑
    if ($sum-($root->val) == 0) {

        $ret = true;
        return;
    }


    helper($root->left, $sum-$root->val, $ret);
    helper($root->right, $sum-$root->val, $ret);
}