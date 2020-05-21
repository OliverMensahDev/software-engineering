class Node {
    constructor(value, next, prev){
        this.value = value;
        this.next = next,
        this.prev = prev
    }    
}
class DoublyLinkedList {
    constructor(){
        this.head = null;
        this.tail = null;
    }
    addTohead(val){
        if(!this.head){
            let newNode = new Node(val,null, null);
            this.head = newNode;
            this.tail = newNode
        }else{
            let newNode = new Node(val, this.head, null);
            newNode.next = this.head;
            this.head = newNode;
        }
    }
    addToTail(val){
        let newNode = new Node(val, null);
        if(!this.tail){
            this.tail = newNode;
            this.head = newNode;
        }else{
            this.tail.next = newNode;
            this.tail = newNode;
        }
    }

    removeHead() {
        if (!this.head) return null;
        var val = this.head.value;
        this.head = this.head.next;
        return val;
    };
      
    removeTail() {
        if (!this.tail) return null;
        var val = this.tail.value;
        this.tail = null;
        return val;
    };
    search(searchValue) {
        var currentNode = this.head;
        while (currentNode) {
          if (currentNode.value === searchValue) return currentNode.value;
          currentNode = currentNode.next;
        } 
        return null;
    };   

}


const s = new DoublyLinkedList();
s.addTohead(1)  
s.addTohead(2)
s.addTohead(3);
console.log(s.head.next);

