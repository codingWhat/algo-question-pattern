<?php

/*
Problem Statement #
Given a binary tree where each node can only have a digit (0-9) value, each root-to-leaf path will represent a number.
 Find the total sum of all the numbers represented by all paths.
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
//$root->left->left = new TreeNode(4);
//$root->left->right = new TreeNode(5);
$root->right->left = new TreeNode(2);
$root->right->right = new TreeNode(9);

var_dump(findSumOfPathNumbers($root));
function  findSumOfPathNumbers($root) {
    $cur = 0;
    $sum = 0;
    helper($root, $cur, $sum);

    return $sum;
}

function helper($root, $cur, &$sum) {

    $cur = $cur * 10 + $root->val;
    if (!$root->left && !$root->right) {
        $sum += $cur;
        return;
    }

    helper($root->left, $cur, $sum);
    helper($root->right, $cur, $sum);


}