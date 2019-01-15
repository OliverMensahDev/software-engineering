public class LinkedList <T extends Comparable<T>> implements List<T>{
  
  private Node<T> head;
  private int sizeCounter;
  public static void main(String[] args) {
    LinkedList<Integer> ll = new LinkedList<>();
    ll.insert(30);
    ll.insert(40);
    ll.insert(50);
    //ll.remove(40);
    System.out.println(ll.head);
    
  }
  @Override
  public Node<T> getMiddleNode(){
    Node<T> fastPointer = this.head;
    Node<T> slowPointer = this.head;
    
    while(fastPointer.getNextNode() != null && fastPointer.getNextNode().getNextNode() != null){
      fastPointer = fastPointer.getNextNode().getNextNode();
      slowPointer = slowPointer.getNextNode();
    }
    return slowPointer;
  }
  @Override
  public void reverse(){
    Node<T> currentNode = this.head;
    Node<T> previousNode = null;
    Node<T> nextNode = null;
    
    while(currentNode != null){
      nextNode = currentNode.getNextNode();
      currentNode.setNextNode(previousNode);
      previousNode  = currentNode;
      currentNode = nextNode;
    }
    this.head = previousNode;
  }
  
  @Override
  public void insert(T data){
    if(head == null) 
      head = new Node<>(data);
    else{
      Node<T> currentNode = this.head;
      while(currentNode.getNextNode() != null){
        currentNode = currentNode.getNextNode();
      }
      currentNode.setNextNode(new Node<>(data));
    }     
    ++this.sizeCounter;
  }
  
  @Override
  public void remove(T data){
   Node<T> currentNode = this.head;
   Node<T> prev = null;
   while(currentNode != null){
     if(currentNode.getData() == data){
       currentNode = currentNode.getNextNode();
     }
     currentNode = currentNode.getNextNode();
   }
  }
  
  @Override
  public void traverseList(){
    Node<T> currentNode = this.head;
    while(currentNode != null){
      System.out.print(currentNode);
      currentNode = currentNode.getNextNode();
    }
   
  }
  @Override
  public int size(){
    return sizeCounter;
  }
}

interface List<T extends Comparable<T>>{
  public Node<T> getMiddleNode();
  public void insert(T data);
  public void remove (T data);
  public void traverseList();
  public void reverse();
  public int size();
}

class Node <T extends Comparable<T>>{
  private T data;
  private Node<T> nextNode;
  
  public Node(T data){
    this.data = data;
  }
  
  public T getData(){
    return data;
  }
  
  public Node<T> getNextNode(){
    return nextNode;
  }
  public void setNextNode(Node<T> nextNode){
    this.nextNode = nextNode;
  }
  
  @Override 
  public String toString(){
    return this.data.toString();
  }
}