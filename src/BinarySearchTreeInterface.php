<?php

namespace BinaryTree;

interface BinarySearchTreeInterface
{
    /**
     * Insert a node in the tree according to the rules of a binary search tree.
     *
     * @param NodeInterface|null $node
     */
    public function insert($node);

    /**
     * Check if the tree is balanced.
     *
     * @return bool
     */
    public function isBalanced();

    /**
     * Print the tree in order.
     *
     * @return string
     */
    public function printInOrder();
}
