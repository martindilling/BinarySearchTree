<?php namespace BinaryTree\Tests;

use BinaryTree\BinarySearchTree;
use BinaryTree\Node;

class BinarySearchTreeTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_can_insert_node()
    {
        $tree = new BinarySearchTree();

        $node1 = new Node(1, 'First');
        $node2 = new Node(2, 'Second');
        $node3 = new Node(3, 'Third');

        $tree->insert($node1);
        $tree->insert($node2);
        $tree->insert($node3);

        $this->assertEquals(null, $node1->getParent());
        $this->assertEquals(null, $node1->getLeft());
        $this->assertEquals($node2, $node1->getRight());

        $this->assertEquals($node1, $node2->getParent());
        $this->assertEquals(null, $node2->getLeft());
        $this->assertEquals($node3, $node2->getRight());

        $this->assertEquals($node2, $node3->getParent());
        $this->assertEquals(null, $node3->getLeft());
        $this->assertEquals(null, $node3->getRight());
    }

    /** @test */
    public function it_can_print_the_tree()
    {
        $tree = new BinarySearchTree();

        $node1 = new Node(1, 'First');
        $node2 = new Node(2, 'Second');
        $node3 = new Node(3, 'Third');
        $node4 = new Node(4, 'Fourth');
        $node5 = new Node(5, 'Fifth');

        $tree->insert($node4);
        $tree->insert($node2);
        $tree->insert($node5);
        $tree->insert($node1);
        $tree->insert($node3);

        $this->assertEquals('1 2 3 4 5', $tree->printInOrder());
    }

    /** @test */
    public function it_can_check_if_not_balanced()
    {
        $tree = new BinarySearchTree();

        $node1 = new Node(1, 'First');
        $node2 = new Node(2, 'Second');
        $node3 = new Node(3, 'Third');
        $node4 = new Node(4, 'Fourth');
        $node5 = new Node(5, 'Fifth');

        //                 _______________._______________
        //         _______._______                 _______._______
        //     ___.___         ___.___         ___.___         ___.___
        //   _._     _._     _._     _._     _._     _._     _._     _._
        //  .   .   .   .   .   .   .   .   .   .   .   .   .   .   .   .
        $tree->insert($node1);
        //                 _______________1_______________
        //         _______._______                 _______._______
        //     ___.___         ___.___         ___.___         ___.___
        //   _._     _._     _._     _._     _._     _._     _._     _._
        //  .   .   .   .   .   .   .   .   .   .   .   .   .   .   .   .
        $tree->insert($node2);
        //                 _______________1_______________
        //         _______._______                 _______2_______
        //     ___.___         ___.___         ___.___         ___.___
        //   _._     _._     _._     _._     _._     _._     _._     _._
        //  .   .   .   .   .   .   .   .   .   .   .   .   .   .   .   .
        $tree->insert($node3);
        //                 _______________1_______________
        //         _______._______                 _______2_______
        //     ___.___         ___.___         ___.___         ___3___
        //   _._     _._     _._     _._     _._     _._     _._     _._
        //  .   .   .   .   .   .   .   .   .   .   .   .   .   .   .   .
        $tree->insert($node4);
        //                 _______________1_______________
        //         _______._______                 _______2_______
        //     ___.___         ___.___         ___.___         ___3___
        //   _._     _._     _._     _._     _._     _._     _._     _4_
        //  .   .   .   .   .   .   .   .   .   .   .   .   .   .   .   .
        $tree->insert($node5);
        //                 _______________1_______________
        //         _______._______                 _______2_______
        //     ___.___         ___.___         ___.___         ___3___
        //   _._     _._     _._     _._     _._     _._     _._     _4_
        //  .   .   .   .   .   .   .   .   .   .   .   .   .   .   .   5

        $this->assertFalse($tree->isBalanced());
    }

    /** @test */
    public function it_can_check_if_balanced()
    {
        $tree = new BinarySearchTree();

        $node1 = new Node(1, 'First');
        $node2 = new Node(2, 'Second');
        $node3 = new Node(3, 'Third');
        $node4 = new Node(4, 'Fourth');
        $node5 = new Node(5, 'Fifth');

        //     ___.___
        //   _._     _._
        //  .   .   .   .
        $tree->insert($node4);
        //     ___4___
        //   _._     _._
        //  .   .   .   .
        $tree->insert($node2);
        //     ___4___
        //   _2_     _._
        //  .   .   .   .
        $tree->insert($node5);
        //     ___4___
        //   _2_     _5_
        //  .   .   .   .
        $tree->insert($node1);
        //     ___4___
        //   _2_     _5_
        //  1   .   .   .
        $tree->insert($node3);
        //     ___4___
        //   _2_     _5_
        //  1   3   .   .

        $this->assertTrue($tree->isBalanced());
    }
}
