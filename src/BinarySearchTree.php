<?php namespace BinaryTree;

class BinarySearchTree implements BinarySearchTreeInterface
{
    /**
     * Reference to the root tree.
     *
     * @var NodeInterface
     */
    protected $root = null;

    /**
     * Insert a node in the tree according to the rules of a binary search tree.
     *
     * @param NodeInterface|null $node
     */
    public function insert($node)
    {
        if ($this->root === null) {
            $this->root = $node;

            return;
        }

        $this->insertIn($this->root, $node);
    }

    /**
     * Check if the tree is balanced.
     *
     * @return bool
     */
    public function isBalanced()
    {
        return $this->isNodeBalanced($this->root);
    }

    /**
     * Print the tree in order.
     *
     * @return string
     */
    public function printInOrder()
    {
        if ($this->root == null) {
            return 'The tree is empty!';
        }

        return $this->printNodeInOrder($this->root->getLeft()) . ' ' . $this->root->getKey() . ' ' . $this->printNodeInOrder($this->root->getRight());
    }

    /**
     * Insert a given note in a given root-note.
     *
     * @param NodeInterface|null $root
     * @param NodeInterface      $node
     */
    protected function insertIn($root, $node)
    {
        $isLowerThanRoot = $node->getKey() <= $root->getKey();

        if ($isLowerThanRoot) {
            $this->insertTo('Left', $root, $node);
        } else {
            $this->insertTo('Right', $root, $node);
        }
    }

    /**
     * @param string             $side 'Left' or 'Right'
     * @param NodeInterface|null $root
     * @param NodeInterface      $node
     */
    protected function insertTo($side, $root, $node)
    {
        $get = 'get' . $side;
        $set = 'set' . $side;

        if ($root->{$get}() === null) {
            $root->{$set}($node);

            return;
        }

        $this->insertIn($root->{$get}(), $node);
    }

    /**
     * Check if node is balanced.
     *
     * @param NodeInterface|null $node
     * @return bool
     */
    protected function isNodeBalanced($node)
    {
        if ($node === null) {
            return true;
        }

        $isLeftNodeBalanced  = $this->isNodeBalanced($node->getLeft());
        $isRightNodeBalanced = $this->isNodeBalanced($node->getRight());

        $leftHeight          = $this->nodeHeight($node->getLeft());
        $rightHeight         = $this->nodeHeight($node->getRight());
        $isHeightDiffToGreat = abs($leftHeight - $rightHeight) <= 1;

        return $isLeftNodeBalanced && $isRightNodeBalanced && $isHeightDiffToGreat;
    }

    /**
     * Get the height of a node.
     *
     * @param NodeInterface|null $node
     * @return int
     */
    protected function nodeHeight($node)
    {
        return $node === null ? 0 : $node->getHeight();
    }

    /**
     * Print a node in order.
     *
     * @param NodeInterface|null $node
     * @return string
     */
    protected function printNodeInOrder($node)
    {
        if ($node === null) {
            return '';
        }

        return trim($this->printNodeInOrder($node->getLeft()) . ' ' . $node->getKey() . ' ' . $this->printNodeInOrder($node->getRight()));
    }
}
