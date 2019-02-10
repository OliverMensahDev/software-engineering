class LogicalOperators {
  public static void main(String[] args) {
    int a = 3;
    int b = 5;
    if( a < b & b < 6 ){
      System.out.println("Hey checking logical operator & ");
    }
    
     if( a > b | b < 4 ){
      System.out.println("Hey checking logical operator |");
    }
     
     
     if( a < b && b < 6 ){
      System.out.println("Hey checking logical operator && ");
    }
    
     if( a > b || b < 4 ){
      System.out.println("Hey checking logical operator ||");
    }
     
     boolean done = false;
     if(!done) {
      System.out.println("Hey checking logical operator !");
    }
  }
}