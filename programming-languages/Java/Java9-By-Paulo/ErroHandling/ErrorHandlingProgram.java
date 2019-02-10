public class ErrorHandlingProgram {
  public static void main(String[] args){
    float sum = 0;
    for(String arg : args) {
      try{
        sum = sum + Float.parseFloat(arg);
      }catch(Exception e) {
         System.out.println(arg + " is not a number");
        }
    }
    System.out.println(sum);
  }
}
