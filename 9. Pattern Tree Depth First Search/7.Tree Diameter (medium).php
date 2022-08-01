<?php
/*
 Tree Diameter (medium) #
Given a binary tree, find the length of its diameter.
The diameter of a tree is the number of nodes on the longest path between any two leaf nodes.
The diameter of a tree may or may not pass through the root.

Note: You can always assume that there are at least two leaf nodes in the given tree.
 */


// leetcode 543

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

$dia = 0;
findDiameter($root, $dia);
var_dump($dia);
function findDiameter($root, &$dia) {
    if(!$root) return 0;

    $left = findDiameter($root->left, $dia);
    $right = findDiameter($root->right, $dia);

    $dia = max($dia, $left + $right);

    return max($left, $right) + 1;
}
