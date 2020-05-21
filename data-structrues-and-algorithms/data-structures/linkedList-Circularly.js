 //node 
 class Node {
    constructor(value, next, prev){
        this.value = value;
        this.next = next;
        this.prev = prev;
    }    
}

class LinkeList{
    constructor(){
        this.head = null;
        this.tail = null;
    }
    addTohead(value) {
        var newNode = new Node(value, this.head, null);
        if (this.head) this.head.prev = newNode;
        else this.tail = newNode;
        this.head = newNode;
    };
    addToTail(value) {
        var newNode = new Node(value, null, this.tail);
        if (this.tail) this.tail.next = newNode;
        else this.head = newNode;
        this.tail = newNode;
    };
    removeHead() {
        if (!this.head) return null;
        var val = this.head.value;
        this.head = this.head.next;
        if (this.head) this.head.prev = null;
        else this.tail = null;
        return val;
    };
      
    removeTail() {
        if (!this.tail) return null;
        var val = this.tail.value;
        this.tail = this.tail.prev;
        if (this.tail) this.tail.next = null;
        else this.head = null;
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
      
    getIndex(value) {
        var indexes = [];
        var currentIndex = 0;
        var currentNode = this.head;
        while(currentNode) {
          if (currentNode.value === value) indexes.push(currentIndex);
          currentNode = currentNode.next;
          currentIndex++;
        }
        return indexes;
    };
 }

 let ll = new LinkeList();
 ll.addTohead(5);
 ll.addTohead(10);
 ll.addToTail(20)
 ll.addToTail(30)
 console.log(ll);
 
 
