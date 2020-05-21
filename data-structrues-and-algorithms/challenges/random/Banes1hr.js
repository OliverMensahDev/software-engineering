/** Stack */
// using js array as stack for palindrome
function palindrome() {
  var letters = [];
  var word = "racecar";
  var rword = "";
  for (let i = 0; i < word.length; i++) {
    letters.push(word[i]);
  }
  for (let i = 0; i < word.length; i++) {
    rword += letters.pop();
  }
  if (word == rword) return true;
  else return false;
}
console.log(palindrome());

//stack class
var Stack = function() {
  this.count = 0;
  this.storage = {};
  this.push = function(value) {
    this.storage[this.count++] = value;
  };
  this.pop = function() {
    if (this.count == 0) return undefined;
    var result = this.storage[this.count--];
    delete this.storage[this.count];
    return result;
  };
  this.size = function() {
    return this.count;
  };
  this.top = function() {
    return this.storage[this.count - 1];
  };
};
stack = new Stack();
stack.push(2);
stack.push(3);
res = stack.top();
console.log(res);

//** Set */
function mySet() {
  var collection = [];
  this.has = function(element) {
    return collection.indexOf(element) !== -1;
  };
  this.value = function() {
    return collection;
  };
  this.add = function(element) {
    if (!this.has(element)) {
      collection.push(element);
      return true;
    }
    return false;
  };
  this.remove = function(element) {
    if (this.has(element)) {
      index = collection.indexOf(element);
      collection.splice(index, 1);
      return true;
    }
    return false;
  };
  this.get = function(element) {
    if (this.has(element)) {
      index = collection.indexOf(element);
      return collection[index];
    }
    return null;
  };
  this.size = function() {
    return collection.length;
  };
  this.union = function(otherSet) {
    var unionSet = new mySet();
    var firstSet = this.value();
    var secondSet = otherSet.value();
    firstSet.forEach(function(e) {
      unionSet.add(e);
    });
    secondSet.forEach(function(e) {
      unionSet.add(e);
    });
    return unionSet;
  };
  this.intersection = function(otherSet) {
    var intersectionSet = new mySet();
    var firstSet = this.value();
    firstSet.forEach(function(e) {
      if (otherSet.has(e)) intersectionSet.add(e);
    });
    return intersectionSet;
  };
  this.difference = function(otherSet) {
    var differenceSet = new mySet();
    var firstSet = this.value();
    firstSet.forEach(function(e) {
      if (!otherSet.has(e)) differenceSet.add(e);
    });
    otherSet.value().forEach(e => {
      if (!this.has(e)) differenceSet.add(e);
    });
    return differenceSet;
  };
  this.subset = function(otherSet) {
    var firstSet = this.value();
    return otherSet.value().every(e => {
      return this.has(e);
    });
  };
}
let a = new mySet();
a.add(3);
a.add(4);
let b = new mySet();
b.add(4);
let c = a.subset(b);
console.log(c);

//** Queue */
function Queue() {
  collection = [];
  this.print = function() {
    console.log(collection);
  };
  this.enqueue = function(element) {
    collection.push(element);
  };
  this.dequeue = function() {
    return collection.shift();
  };
  this.front = function() {
    return collection[0];
  };
  this.size = function() {
    return collection.length;
  };
  this.isEmpty = function() {
    return collection.length === 0;
  };
}
let q = new Queue();
q.enqueue(3);
q.enqueue(4);
q.enqueue(5);
q.dequeue();
q.print();

function priorityQueue() {
  let collection = [];
  this.print = function() {
    console.log(collection);
  };
  this.enqueue = function(element) {
    if (this.isEmpty()) collection.push(element);
    else {
      let added = false;
      for (let i = 0; i < collection.length; i++) {
        if (element[1] > collection[i][1]) {
          collection.splice(i, 0, element);
          added = true;
          break;
        }
      }
      if (!added) {
        collection.push(element);
      }
    }
  };
  this.dequeue = function() {
    let value = collection.shift();
    return value[0];
  };
  this.front = function() {
    return collection[0];
  };
  this.size = function() {
    return collection.length;
  };
  this.isEmpty = function() {
    return collection.length === 0;
  };
}
var p = new priorityQueue();
p.enqueue(["oliver", 1]);
p.enqueue(["eva", 2]);
p.print();

//** BST */
function Node(data, left = null, right = null) {
  this.data = data;
  this.right = right;
  this.left = left;
}
function BST() {
  this.root = null;
  this.add = function(data) {
    const node = this.root;
    if (node == null) {
      this.root = new Node(data);
      return;
    } else {
      if (data < this.root.data) {
        if (!this.left) this.left = new BST(data);
        else this.left.add(data);
      }
      if (data > this.root.data) {
        if (!this.right) this.right = new BST(data);
        else this.right.add(data);
      }
    }
  };
}
let bst = new BST();
bst.add(3);
bst.add(5);
bst.add(2);
bst.add(4);
console.log(bst);
