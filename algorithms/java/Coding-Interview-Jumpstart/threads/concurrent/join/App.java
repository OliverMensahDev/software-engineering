public class App { 
 
 public static void main(String[] args) { 
   
   
  Runner1 t1 = new Runner1(); 
  Runner2 t2 = new Runner2(); 
   
  t1.start(); 
  t2.start(); 
   
  try { 
   t1.join(); // wait for first thread
   t2.join(); // wait for second thread
  } catch (InterruptedException e) { 
   e.printStackTrace(); 
  } 
   
  System.out.println("Finished the tasks...");  // print this from application thread after first and second have finished
 } 
} 
class Runner1 extends Thread { 
  
 @Override 
 public void run() { 
  for(int i=0;i<10;++i){ 
   System.out.println("Runner1: "+i); 
   try { 
    Thread.sleep(100); 
   } catch (InterruptedException e) { 
    e.printStackTrace(); 
   } 
  } 
 } 
} 
 
class Runner2 extends Thread { 
  
 @Override 
 public void run() { 
  for(int i=0;i<100;++i){ 
   System.out.println("Runner2: "+i); 
   try { 
    Thread.sleep(100); 
   } catch (InterruptedException e) { 
    e.printStackTrace(); 
   } 
  } 
 } 
} 
 
