<?php
/*
Right View of a Binary Tree (easy) #
Given a binary tree, return an array containing nodes in its right view.
The right view of a binary tree is the set of nodes visible when the tree is seen from the right side.
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

/*
  12
 7   1
9   10 5
*/
$root = new TreeNode(12);
$root->left = new TreeNode(7);
$root->right = new TreeNode(1);
//$root->left->left = new TreeNode(12);
$root->left->right = new TreeNode(9);
$root->right->left = new TreeNode(10);
$root->right->right = new TreeNode(5);

var_dump(traversal($root));

function traversal($root) {
    $queue = [$root];
    $ret = [];
    while (!empty($queue)) {
        $size = count($queue);
        for ($i = 0; $i < $size; $i++) {
            $cur = array_shift($queue);
            if ($i == $size-1) {
                $ret[] = $cur->val;
            }

            $cur->left && $queue[] = $cur->left;
            $cur->right && $queue[] = $cur->right;
        }
    }

    return $ret;
}