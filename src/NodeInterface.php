<?php namespace BinaryTree;

interface NodeInterface
{
    /**
     * @return int
     */
    public function getKey();

    /**
     * @param int $key
     */
    public function setKey($key);

    /**
     * @return mixed
     */
    public function getData();

    /**
     * @param mixed $data
     */
    public function setData($data);

    /**
     * @return NodeInterface|null
     */
    public function getParent();

    /**
     * @return NodeInterface|null
     */
    public function getLeft();

    /**
     * @param NodeInterface $left
     */
    public function setLeft(NodeInterface $left);

    /**
     * @return NodeInterface|null
     */
    public function getRight();

    /**
     * @param NodeInterface $right
     */
    public function setRight(NodeInterface $right);

    /**
     * Is the node a root-node.
     *
     * @return bool
     */
    public function isRoot();

    /**
     * Is the node a leaf-node.
     *
     * @return bool
     */
    public function isLeaf();

    /**
     * How deep is the node from the root-node.
     *
     * @return int
     */
    public function getDepth();

    /**
     * How high is the node up from the deepest leaf-node.
     *
     * @return int
     */
    public function getHeight();
}
