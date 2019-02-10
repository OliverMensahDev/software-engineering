class ConditionalAssignment{
  public static void main(String[] args){
    int age = 5;
    String result;
    
//    if(age > 6) {
//      result = "Old";
//    }else{
//      result = "Young";
//    }
    
    
    
    /* conditional assignment 
     * answer = condition? Answer_for_true : answer_for_false 
     */
     result = age > 6? "Old" : "Young";
    
    System.out.println(result);
    
     for( int i = 1; i <= 20; i++){
       result = i % 2 ==0 ? "Even: "+ i : "Odd: " + i;
       System.out.println(result);
    }
    
  }
}