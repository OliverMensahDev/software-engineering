Arrays vs Lists

Array
  - a very fundamental, low-level data structure
  - has a fixed size
  - you create an array by specifying it's size
  - you can write to an array with: a[index] = value
  - you can read from an array with x = a[index]
  - any manipulations we want to do such as insert at the middle, delete,etc, we must code manually

List
  - A data structure built out of an array
  - has no fixed size
  - is often created empty, then values are added to it
  - you can add something to a list with l.add(value)
  - you can read something from a list  with x = l.get(index)
  - takes the array, builds up abstract functions which could be called to manipulate the data without manually coding it up. 

NB: From universal perspectives, that's the difference 
What JavaScript, Ruby calls array is very much of a list since it has methods tht keeps changing the size of it and hence violates the basic array principle