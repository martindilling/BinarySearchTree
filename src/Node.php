<?php namespace BinaryTree;

class Node implements NodeInterface
{
    /**
     * @var int
     */
    protected $key;

    /**
     * @var mixed
     */
    protected $data = null;

    /**
     * @var NodeInterface|null
     */
    protected $parent = null;

    /**
     * @var NodeInterface|null
     */
    protected $left = null;

    /**
     * @var NodeInterface|null
     */
    protected $right = null;


    /**
     * @param int   $key
     * @param mixed $data
     */
    public function __construct($key, $data)
    {
        $this->key  = $key;
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param int $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return NodeInterface|null
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return NodeInterface|null
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @param NodeInterface $left
     */
    public function setLeft(NodeInterface $left)
    {
        $this->left   = $left;
        $left->parent = $this;
    }

    /**
     * @return NodeInterface|null
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * @param NodeInterface $right
     */
    public function setRight(NodeInterface $right)
    {
        $this->right   = $right;
        $right->parent = $this;
    }


    /**
     * Is the node a root-node.
     *
     * @return bool
     */
    public function isRoot()
    {
        return $this->getParent() === null;
    }

    /**
     * Is the node a leaf-node.
     *
     * @return bool
     */
    public function isLeaf()
    {
        return $this->getLeft() === null && $this->getRight() === null;
    }

    /**
     * How deep is the node from the root-node.
     *
     * @return int
     */
    public function getDepth()
    {
        if ($this->isRoot()) {
            return 0;
        }

        return $this->getParent()->getDepth() + 1;
    }

    /**
     * How high is the node up from the deepest leaf-node.
     *
     * @return int
     */
    public function getHeight()
    {
        if ($this->isLeaf()) {
            return 0;
        }

        $leftHeight  = 0;
        $rightHeight = 0;

        if ($this->getLeft() !== null) {
            $leftHeight = $this->getLeft()->getHeight();
        }

        if ($this->getRight() !== null) {
            $rightHeight = $this->getRight()->getHeight();
        }

        return max([$leftHeight, $rightHeight]) + 1;
    }
}
