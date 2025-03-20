<?php
/*
Given a binary tree, populate an array to represent its level-by-level traversal in reverse order, i.e.,
 the lowest level comes first. You should populate the values of all nodes in each level from left to right in separate sub-arrays.


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

var_dump(traversal($root));

$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->right = new TreeNode(3);
$root->left->left = new TreeNode(4);
$root->left->right = new TreeNode(5);
$root->right->left = new TreeNode(6);
$root->right->right = new TreeNode(7);

var_dump(traversal($root));

//时间复杂度: O(n)
//空间复杂度: O(n)
function traversal($root) {

    $queue = [$root];

    $res = [];
    while (!empty($queue)) {
        $num  = count($queue);
        $tmp = [];
        for ($i = 0; $i < $num; $i++) {
            $item = array_shift($queue);
            $tmp[] = $item->val;
            $item->left &&  $queue[] = $item->left;
            $item->right &&  $queue[] = $item->right;

        }
       array_unshift($res, $tmp);
    }

    return $res;
}