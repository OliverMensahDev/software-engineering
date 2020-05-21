class ListNode{
  constructor(data, next =null){
    this.data = data;
    this.next = next
  }
}

n1 = new ListNode(3)
n2 = new ListNode(4)
n3 = new ListNode(5)


n1.next = n2
n2.next = n3

function loopTemplate(node){
  let current = node
  while(current != null){
    current = current.next    
  } 
}

function printList(node){
  let current = node
  while(current != null){
    console.log(current.data);
    current = current.next    
  }
}

function sumList(node){
  let current = node
  let sum = 0
  while(current != null){
    sum += current.data
    current = current.next    
  }
  console.log(sum);
  
}


printList(n1)
sumList(n1)
console.log(n1);
