class ListNode{
  constructor(data, next =null){
    this.data = data;
    this.next = next
  }
}

function printList(root){
  let current = root;
  let res = ""
  while (current != null){
    res += current.data + " -> "
    current = current.next
  }
  res += "null"
  console.log(res);
}

// start: null 
// end : 1 -> 2 -> 3

function problem1(){
  let n1 = new ListNode(1)
  let n2 = new ListNode(2)
  let n3 = new ListNode(3)

  n1.next = n2
  n2.next = n3
  printList(n1)

  //reverse
  let root = new ListNode(3)
  let node = new ListNode(2)
  node.next = root 
  root = node 

  node = new ListNode(1)
  node.next = root 
  root = node
  printList(root)


}

// start: 1 -> 2 -> 3
// end : 0 -> 1 -> 2 -> 3
function problem2(){
  let root = new ListNode(1, new ListNode(2, new ListNode(3)))
  let zero = new ListNode(0)
  zero.next = root 
  root = zero 
  printList(root)
}

// start: 1 -> 3 -> 4
// end:   1 -> 2 -> 3 -> 4
function problem3(){
  let root = new ListNode(1)
  root.next = new ListNode(3)
  root.next.next = new ListNode(4)
  
  let n2 = new ListNode(2)

  //right
  // n2.next = root.next
  // root.next = n2 

  //wrong  = immediate assignment causing loss of pointers
  root.next = n2

  printList(root);
}


//start 1 -> 2 ->3
// end 1 -> 2 -> 3 -> 4
function problem4(){
  let root = new ListNode(1, new ListNode(2, new ListNode(3)))
  root.next.next.next = new ListNode(4)
  printList(root)
}



//start 1 -> 99 -> 2 ->3
// end 1 -> 2 -> 3
function problem5(){
  let root = new ListNode(1, new ListNode(99, new ListNode(2, new ListNode(3))))
  root.next = root.next.next 
  printList(root)
}

problem5()