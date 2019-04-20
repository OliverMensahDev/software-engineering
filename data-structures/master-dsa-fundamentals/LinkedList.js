class ListNode{
  constructor(data, next =null){
    this.data = data
    this.next = null
  }
}

class LinkedList{
  constructor(){
    this.root = null
    this.size = 0
  }

  prepend(data){
    // add by checking content 

    // if(this.root == null)  
    //   this.root = new ListNode(data)
    // else{
    //   let node = new ListNode(data,this.root)
    //   this.root = node;      
    // }

    // just append without checking it content
    let node = new ListNode(data)
    node.next = this.root
    this.root = node;  
    this.size++    
  }

  length(){
    let current = this.root;
    let count = 0
    while (current != null){
      count++;
      current = current.next
    }
    return count;
  }

  isEmpty(){
    return this.root == null;
  }

  toString(){
    let current = this.root;
    let res = "root "
    while (current != null){
      res += current.data + " -> "
      current = current.next
    }
    res += "null"
    console.log(res);
  }

  getAtIndex(index){
    let current = this.root;
    let count = 0
    while (current != null){
      if( count == index){
        return current.data
      }
      count++
      current = current.next
    }
    return null
  }

  removeAtIndex(index){
    if(index < 0 || index >= this.size)  return;
    if(index == 0){
      //first
      if(this.root != null)
        this.root = this.root.next
    }else if(index < this.size){
      //middle and end
      let current = this.root
      let i = 0
      while(current != null && i < index - 1){
        current = current.next
        i++
      }
      current = current.next.next
    }
    this.size--
  }

  addAtIndex(index, value){
    if(this.index == 0){
      this.prepend(value)
    }else{
      let current = this.root
      let i = 0 
      while(current != null && i < index -1){
        i++ 
        current = current.next
      }
      let node = new ListNode(value)
      node.next = current.next
      current.next = node
    }
    this.size++
  }

  append(data){
    this.addAtIndex(this.size -1 , data)
  }
}


ll = new LinkedList()
ll.prepend(3)
ll.prepend(4)
ll.toString()

console.log(ll.get(1));

