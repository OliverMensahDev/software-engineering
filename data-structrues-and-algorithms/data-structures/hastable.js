class HashNode{
    constructor(key, value, next) {
        this.key = key;
        this.value = value;
        this.next = next || null;
    }
}
class HashTable{
    constructor(size){
        this.buckets = Array(size);
        this.numBuckets = this.buckets.length;
    }
    hash(key) {
        var total = 0;
        for (var i = 0; i < key.length; i++) {
        total += key.charCodeAt(i);
        }
        var bucket = total % this.numBuckets;
        return bucket;
    };
  
    insert(key, value) {
        var index = this.hash(key);
        if (!this.buckets[index]) {
        this.buckets[index] = new HashNode(key, value);
        }
        else if (this.buckets[index].key === key) {
        this.buckets[index].value = value;
        }
        else {
        var currentNode = this.buckets[index];
        while (currentNode.next) {
            if (currentNode.next.key === key) {
            currentNode.next.value = value;
            return;
            }
            currentNode = currentNode.next;
        }
        currentNode.next = new HashNode(key, value);
        }
    };
  
    get(key) {
        var index = this.hash(key);
        if (!this.buckets[index]) return null;
        else {
        var currentNode = this.buckets[index];
        while (currentNode) {
            if (currentNode.key === key) return currentNode.value;
            currentNode = currentNode.next;
        }
        return null;
        }
    };
  
    retrieveAll() {
        var allNodes = [];
        for (var i = 0; i < this.numBuckets; i++) {
        var currentNode = this.buckets[i];
        while(currentNode) {
            allNodes.push(currentNode);
            currentNode = currentNode.next;
        }
        }
        return allNodes;
    };
}
  
  var myHT = new HashTable(30);
  

  myHT.insert('Dean', 'deanmachine@gmail.com');
  myHT.insert('Megan', 'megansmith@gmail.com');
  myHT.insert('me', 'dane1010@outlook.com');
  
  console.log(myHT.retrieveAll())