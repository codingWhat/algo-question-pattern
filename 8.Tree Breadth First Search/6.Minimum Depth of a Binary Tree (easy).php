<?php
/*
 Problem Statement #
Find the minimum depth of a binary tree.
 The minimum depth is the number of nodes along the shortest path from the root node to the nearest leaf node.
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
//$root->left->right = new TreeNode(9);
$root->right->left = new TreeNode(10);
$root->right->right = new TreeNode(5);

//时间复杂度：O（n）, 空间复杂度 O(n)

var_dump(findDepth($root));
function findDepth($root) {

    $queue = [$root];
    $minDepth = 0;
    while(!empty($queue)) {
        $minDepth++;
        $size = count($queue);
        for ($i = 0; $i < $size; $i++) {
            $cur = array_shift($queue);
            if (!$cur->left && !$cur->right) {
                return  $minDepth;
              //  $minDepth = min($minDepth, $level);
            }

            $cur->left && $queue[] = $cur->left;
            $cur->right && $queue[] = $cur->right;
        }
    }

    return $minDepth;
}

