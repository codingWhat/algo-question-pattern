<?php
/*
Problem Statement #
Given a binary tree, connect each node with its level order successor.
The last node of each level should point to a null node.
 */
//将每一层元素，用next指针链接，层中最后一个元素next指向null
//for循环时，记录上一个元素，然后将当前元素赋值给上一个元素的next指针
//时间复杂度:On, 空间复杂度:O(N)

/*
 *
 https://leetcode.cn/problems/populating-next-right-pointers-in-each-node/solution/dong-hua-yan-shi-san-chong-shi-xian-116-tian-chong/

时间复杂度：O(n)
空间复杂度：O(1)

 class Solution {
	public Node connect(Node root) {
		if(root==null) {
			return root;
		}
		Node pre = root;
		//循环条件是当前节点的left不为空，当只有根节点
		//或所有叶子节点都出串联完后循环就退出了
		while(pre.left!=null) {
			Node tmp = pre;
			while(tmp!=null) {
				//将tmp的左右节点都串联起来
				//注:外层循环已经判断了当前节点的left不为空
				tmp.left.next = tmp.right;
				//下一个不为空说明上一层已经帮我们完成串联了
				if(tmp.next!=null) {
					tmp.right.next = tmp.next.left;
				}
				//继续右边遍历
				tmp = tmp.next;
			}
			//从下一层的最左边开始遍历
			pre = pre.left;
		}
		return root;
	}
}

时间复杂度：O(n)
空间复杂度：O(h)h 是树的高度
class Solution {
	public Node connect(Node root) {
		dfs(root);
		return root;
	}

	void dfs(Node root) {
		if(root==null) {
			return;
		}
		Node left = root.left;
		Node right = root.right;
		//配合动画演示理解这段，以root为起点，将整个纵深这段串联起来
		while(left!=null) {
			left.next = right;
			left = left.right;
			right = right.left;
		}
		//递归的调用左右节点，完成同样的纵深串联
		dfs(root.left);
		dfs(root.right);
	}
}

 */