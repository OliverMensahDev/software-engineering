public class App{
  public static void main(String[] args){
    Thread t1 = new Thread(new Runner1());
    t1.start();
    Thread t2 = new Thread(new Runner2());
    t2.start();
  }
}

class Runner1 implements Runnable{
  @Override
  public void run(){
    for(int i = 0; i <= 10; i++){
      System.out.println("Runner1: " + i);
    }
    System.out.println();
  }
}
  

class Runner2 implements Runnable{
  @Override
  public void run(){
    for(int i = 0; i <= 10; i++){
      System.out.println("Runner2: " + i);
    }
    System.out.println();
  }
}  

