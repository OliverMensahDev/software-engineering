class ConditionalLogic {
  public static void main(String[] args){
    int b = 1;
    
    if( b == 2) {
      System.out.println("B is "+ 2);
    }
    else if( b > 2){
      System.out.println("B  is greater than "+ 2);
    }
    else {
      System.out.println();
    }
    
    int c = 5;
    
    if ( c == 2)  System.out.println(" C is "+ 2);
    else if( c > 2) System.out.println("C  is greater than "+ 2);
    else System.out.println();
    
    int iVal = 25;
    switch(iVal % 2) {
      case 0:
        System.out.print(iVal);
        System.out.println(" is even");
        break;
      case 1:
        System.out.print(iVal);
        System.out.println(" is odd");
        break;
      default:
        System.out.println("oops it broke");
        break;
    }
  }
}
