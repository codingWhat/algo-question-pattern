<?php

/*
 Problem Statement #
Given a binary tree and a number sequence,
 find if the sequence is present as a root-to-leaf path in the given tree.
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


$seq = [1, 9, 9];
var_dump(findPath($root, $seq));


$root = new TreeNode(1);
$root->left = new TreeNode(0);
$root->right = new TreeNode(1);
$root->left->left = new TreeNode(1);
//$root->left->right = new TreeNode(5);
$root->right->left = new TreeNode(6);
$root->right->right = new TreeNode(5);


$seq = [1, 0, 7];
$seq = [1, 1, 6];
var_dump(findPath($root, $seq));
function findPath($root, $sequence) {
   return helper($root, $sequence, 0);
}

function helper($node, $sequence, $idx) {

    if (!$node && $idx+1 <=  count($sequence)) {
        return  false;
    }

    if ($node->val != $sequence[$idx]) {
        return false;
    }

    if (($idx == count($sequence)-1)) {
        return  true;
    }

    return (helper($node->left, $sequence, $idx+1) ||
    helper($node->right, $sequence, $idx+1));

}