function LList() {
    this.head = new Node("head");
    this.find = find;
    this.insert = insert;
    //this.remove = remove;   this.display = display;
}

function Node(element) {
    this.element = element;
    this.next = null;
}

function find(item) {
    var currNode = this.head;
    while (currNode.element != item) { 
        currNode = currNode.next; 
    }
    return currNode;
}

function insert(newElement, item) {
    var newNode = new Node(newElement);
    var current = this.find(item);
    newNode.next = current.next;
    current.next = newNode;
}

function display() {
    var currNode = this.head;
    while (!(currNode.next == null)) {
        print(currNode.next.element);
        currNode = currNode.next; 
    } 
}

var cities = new LList();
cities.insert("Mumbai", "head");
cities.insert("New York", "Mumbai");
cities.insert("Alma", "New York");
cities.insert("Melbourne","Alma");
console.log(cities);
console.log(JSON.stringify(cities));
//cities.display();


