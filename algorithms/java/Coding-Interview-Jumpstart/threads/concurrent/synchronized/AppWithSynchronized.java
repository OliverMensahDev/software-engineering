public class AppWithSynchronized{
  private static int  counter = 0;
  
  public static void main(String[] args){
    process();
    System.out.println(counter);
  }
  static synchronized void increment(){
    ++counter;
  }
  static void process(){
    Thread t1 = new Thread(new Runnable(){
      @Override
      public void run(){
        for(int i =0; i < 100; i++){
          increment();
        }
      }
    });
    Thread t2 = new Thread(new Runnable(){
      @Override
      public void run(){
        for(int i =0; i < 100; i++){
          increment();
        }
      }
    });    
    t1.start();
    t2.start();
    try{
      t1.join();
      t2.join();
    }catch(InterruptedException e){}
    
  }
  
}