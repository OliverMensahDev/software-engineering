
// Notion of Liskov
public Stack<T> extends ArrayList<T> {
  private int stackPointer = 0;
  
  public void push(T item) {
     add(stackPointer++, item);
  }
  
  public T pop(){
    return remove(--stackPointer);
  }
  
  public static void main(String args[]) {
    Stack<String> myStack = new Stack<>();
    myStack.push("1");
    // because of extend we can use more of arraylist method we have not implemented like clear and it should work 
    myStack.clear();
    String s = myStack.pop();
  }
}

// make it better by making it a contents( contains) not same
public Stack<T>  {
  ArrayList<T> contents = new ArrayList<T>();
  private int stackPointer = 0;
  
  public void push(T item) {
     contents.add(stackPointer++, item);
  }
  
  public T pop(){
    return contents.remove(--stackPointer);
  }
  
  public static void main(String args[]) {
    Stack<String> myStack = new Stack<>();    myStack.push("1");
    // because of of content it can't used those arrayList methods we have not used in our code 
    String s = myStack.pop();
  }
}