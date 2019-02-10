public class ProcessAPIProgram {
  public static void main(String[] args){
    ProcessHandle current = ProcessHandle.current();
    ProcessHandle.Info info = current.info();
    System.out.println(info);
  }
}