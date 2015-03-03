<?php namespace BinaryTree\Tests;

use BinaryTree\Node;

class NodeTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_can_contain_key_and_data()
    {
        $node = new Node(1, 'data');

        $this->assertEquals(1, $node->getKey());
        $this->assertEquals('data', $node->getData());
    }

    /** @test */
    public function it_can_have_children()
    {
        $node       = new Node(2, '');
        $leftChild  = new Node(1, '');
        $rightChild = new Node(3, '');
        $node->setLeft($leftChild);
        $node->setRight($rightChild);

        $this->assertEquals($leftChild, $node->getLeft());
        $this->assertEquals($rightChild, $node->getRight());
    }

    /** @test */
    public function it_can_have_parent()
    {
        $node       = new Node(2, '');
        $leftChild  = new Node(1, '');
        $rightChild = new Node(3, '');
        $node->setLeft($leftChild);
        $node->setRight($rightChild);

        $this->assertEquals($node, $leftChild->getParent());
        $this->assertEquals($node, $rightChild->getParent());
    }

    /** @test */
    public function it_can_check_if_root_child_or_leaf()
    {
        $node       = new Node(2, '');
        $child      = new Node(1, '');
        $grandchild = new Node(3, '');
        $node->setLeft($child);
        $child->setLeft($grandchild);

        $this->assertTrue($node->isRoot());
        $this->assertFalse($child->isRoot());

        $this->assertTrue($grandchild->isLeaf());
        $this->assertFalse($child->isLeaf());
    }

    /** @test */
    public function it_can_get_depth()
    {
        $node       = new Node(2, '');
        $child      = new Node(1, '');
        $grandchild = new Node(3, '');
        $node->setLeft($child);
        $child->setLeft($grandchild);

        $this->assertEquals(0, $node->getDepth());
        $this->assertEquals(1, $child->getDepth());
        $this->assertEquals(2, $grandchild->getDepth());
    }

    /** @test */
    public function it_can_get_height()
    {
        $node       = new Node(2, '');
        $child      = new Node(1, '');
        $grandchild = new Node(3, '');
        $node->setLeft($child);
        $child->setLeft($grandchild);

        $this->assertEquals(2, $node->getHeight());
        $this->assertEquals(1, $child->getHeight());
        $this->assertEquals(0, $grandchild->getHeight());
    }
}
