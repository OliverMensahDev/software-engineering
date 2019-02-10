public class OuterClass {
  int age;
  String name;
  private static class Inner{
    char sex ='F';
  }
  
  public static void main(String[] args){
    OuterClass out = new OuterClass();
    System.out.println(out.sex);
  }
}