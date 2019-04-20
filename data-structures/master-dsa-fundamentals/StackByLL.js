class StackNode{
  constructor(data, next=null){
    this.data = data
    this.next = next
  }
}

class LinkedStack{
  constructor(){
    this.top = null
    this.size = 0
  }

  isEmpty(){
    return this.top === null
  }

  push(value){
    let node = new StackNode(value)
    node.next = this.top 
    this.top = node
    this.size++
  }

  pop(){
    let res = this.top
    this.top = res.next 
    this.size--
    return res.data
  }
  
  peek(){
    return this.top.data
  }

  size(){
    return this.size;
  }
}

let ss = new LinkedStack()
ss.push(55)
ss.push(44)
ss.push(33)
ss.push(22)
ss.push(11)

while(!ss.isEmpty()){
  console.log(ss.pop());
}
