# Arrays vs Lists

## Array
  - a very fundamental, low-level data structure
  - has a fixed size
  - you create an array by specifying it's size
  - you can write to an array with: a[index] = value
  - you can read from an array with x = a[index]

## List
  - A data structure built out of an array
  - has no fixed size
  - is often created empty, then values are added to it
  - you can add something to a list with l.add(value)
  - you can read something from a list  with x = l.get(index)

**NB:** *From universal perspectives, that's the difference .What JavaScript, Ruby calls array is very much of a list since it has methods tht keeps changing the size of it and hence violates the basic array principle*


## Big O Notation
A way to describe how an algorithm performs by analyzing the cost complexity in terms of time and space. 
- How long will it take for our program to execute?
- How much space on the memory(RAM) will it take when our program is executing?

And it is a common thing in data science. Examples of Big O
- O(1) O(n) O(n2) O(logn)

## Linked List 
Big chain of data with boxes called nodes, that has data points(values) 
and  reference(pointer) to another box
- It has a root to reference the first node 
- And the last node points to nothing hence referencing to null.
- Each node can exist in anywhere in memory hence not contiguous 

###  
