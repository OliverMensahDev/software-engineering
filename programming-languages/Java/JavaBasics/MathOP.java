class MathOP {
  public static void main (String []args){
      int a, b, c, d;
  
  a = 10;
  b = 5;
  d = 20;
  System.out.println("a:  " +a);
  
  c = a + b;
  System.out.println("c: " +c);
  c = a - b ;
  System.out.println(c);
  c = a % b;
  System.out.println(c);
  //prefix
  
  c = ++a - b;
    System.out.println(c);
    System.out.println(a);
  
  //postfix
   c = d++ - b;
  System.out.println(c);
  System.out.println(d);
  
  
  }
}
  