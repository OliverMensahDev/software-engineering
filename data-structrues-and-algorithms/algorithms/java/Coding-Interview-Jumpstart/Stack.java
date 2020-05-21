
class Stack{
  private int[] dataStore;
  private int size, top, len;
  public Stack(int n){
    size = n;
    top = -1;
    dataStore = new int[size];
    len = 0;
  }
  
  public void push(int item) throws SomethingWentWrong {
    if(top + 1 >= size) 
      throw new SomethingWentWrong("Index out of Bound");
    dataStore[++top] = item;
    len++;
  }
  
  public int pop() throws SomethingWentWrong{
    if(isEmpty())  throw new SomethingWentWrong("Empty stack");
    len--;
    return dataStore[top--];
  }
  
  public boolean isEmpty(){
    return top == -1;
  }
  
  public int peek() throws SomethingWentWrong {
    if( isEmpty() )
      throw new SomethingWentWrong("Underflow Exception");
    return dataStore[top];
  }
  
  
  public static void main(String[] args){
    Stack s = new Stack(3);
    try{
      s.push(3);
      s.push(4);
      s.push(5);
      s.pop();
      s.pop();
      s.pop();
      s.peek();
    }catch(Exception e){
      System.out.println(e.getMessage());
    }
  }
}

class SomethingWentWrong extends Exception {
  public SomethingWentWrong(String message){
    super(message);
  }
  
}