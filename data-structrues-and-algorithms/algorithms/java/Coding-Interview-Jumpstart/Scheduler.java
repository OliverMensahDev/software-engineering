public class Scheduler { 
  static final int COUNT = 3; 
  static final int SLEEP = 37; 
  public static void main(String args[]) { 
    SimpleThread threads[] = new SimpleThread[COUNT]; 
    for(int i = 0; i < COUNT; ++i) 
      threads[i] = new SimpleThread(i + 1); 
    int index = 0; 
    while(true){ 
      synchronized(threads[index]) { 
        threads[index].notify(); 
      } 
      try { 
        Thread.sleep(SLEEP); 
      } catch (InterruptedException e) { 
        throw new RuntimeException(e); 
      } 
      index = (++index) % COUNT; 
    } 
  } 
}

class SimpleThread extends Thread { 
  private int value; 
  public SimpleThread(int num) { 
    this.value = num;  
      start(); 
  } 
  public void run() { 
    while(true) { 
      synchronized(this) { 
        try { 
          wait(); 
        } catch (InterruptedException e) { 
          throw new RuntimeException(e); 
        } 
        System.out.print(value + " "); 
      } 
    } 
  } 
} 