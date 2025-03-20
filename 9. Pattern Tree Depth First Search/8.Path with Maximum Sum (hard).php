<?php
/*
 Find the path with the maximum sum in a given binary tree.
    Write a function that returns the maximum sum.
A path can be defined as a sequence of nodes between any two nodes and doesn’t necessarily pass through the root.
 */

//leetcode 124
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
$root->left = new TreeNode(2);
$root->right = new TreeNode(3);
$root->left->left = new TreeNode(4);
//$root->left->right = new TreeNode(5);
$root->right->left = new TreeNode(5);
$root->right->right = new TreeNode(6);

var_dump(findMaximumPathSum($root));

function  findMaximumPathSum($root) {
    $sum  = PHP_INT_MIN;
    helper($root, $sum);

    return $sum;
}

function helper($root, &$sum) {
    if (!$root) return 0;

    $lmax = max(helper($root->left, $sum), 0);
    $rmax = max(helper($root->right, $sum), 0);

    $sum = max($sum, $lmax + $rmax+ $root->val);

    return max($lmax, $rmax) + $root->val;
}
