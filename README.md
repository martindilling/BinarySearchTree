# Binary Search Tree

Implementation of a binary search tree, with the ability to check if the tree is balanced or not.

## Example

Here are two examples from the tests.

An unbalanced search tree:

````
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
````

And a balanced search tree:

````
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
````

## Tests

Unit tests is found in the `tests` folder.
Run the tests with:

````
phpunit
````
