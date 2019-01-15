public class LL<T>{
  private Node<T> head;
  private int sizeCounter;

  public static void main(String[] args){
    LL<Integer>  ll = new LL<>();
    ll.insert(3);
    ll.insert(5);
    ll.insert(4);
    ll.insert(7);
    ll.insert(8);
//    System.out.println(ll.getMiddle());
    ll.reverse();
    ll.traverse();
  }
  
  void reverse(){
    //3 5, 7, 8
    Node<T> currentNode  = this.head;
    Node<T> previous = null, next = null;
    
    while(currentNode != null){
      next = currentNode.getNextNode();
      currentNode.setNextNode(previous);
      previous = currentNode;
      currentNode = next;
    }
    this.head = previous;
      
    
  }
  
  T getMiddle(){
    Node<T> slow = this.head;
    Node<T> fast = this.head;
    while(fast.getNextNode() != null && fast.getNextNode().getNextNode() != null){
      fast = fast.getNextNode().getNextNode();
      slow = slow.getNextNode();
    }
    return slow.getData();
  }
  
  void insert(T data){
    if(this.head == null)
      this.head = new Node<T>(data);
    else {
      Node<T> currentNode = this.head;
      while(currentNode.getNextNode() != null){
        currentNode = currentNode.getNextNode();
      }
      currentNode.setNextNode(new Node<T>(data));
    } 
  }
  
  void traverse(){
    Node<T> currentNode = this.head;
      while(currentNode != null){
        System.out.println(currentNode.getData());
        currentNode = currentNode.getNextNode();
      }
  }
  
}

class Node<T>{
  private T value;
  private Node<T> nextNode;
  
  public Node(T data){
    value = data;
  }
  
  public T getData(){
    return value;
  }
  
  public void setNextNode(Node<T> node){
    nextNode = node;
  }
  
  public Node<T> getNextNode(){
    return nextNode;
  }
    
}
  