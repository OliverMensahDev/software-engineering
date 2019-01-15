public class AppNewRunnable{
  public static void main(String[] args){
    
    Thread t1 = new Thread(new Runnable(){
      @Override
      public void run(){
        for(int i = 0; i <= 10; i++){
          System.out.println("Runner2: " + i);
        }
        System.out.println();
      }
    });
    
    t1.start();
    Thread t2 = new Thread(new Runnable(){
      @Override
      public void run(){
        for(int i = 0; i <= 10; i++){
          System.out.println("Runner1: " + i);
        }
        System.out.println();
      }
    });
    t2.start();
  }
}

