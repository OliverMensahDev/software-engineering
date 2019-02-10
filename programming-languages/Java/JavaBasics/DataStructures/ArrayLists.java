import java.util.ArrayList;

public class ArrayLists{
  public static void main(String[] args) {
    ArrayList<String> myString = new ArrayList<>();
    ArrayList<Integer> myInt  = new ArrayList<>();
   // ArrayList<Product> myArrayList = new ArrayList();
    
    
    // operations: add, remove, contains, size 
    myString.add("String 1");
    myString.add("String 2");
    myString.add("String 3");
    myString.add("String 4");
    
    System.out.println(myString.size());
    myString.remove("String 1");
    if(myString.contains("String 2")){
       System.out.println("Present");
     }else{
        System.out.println("Not Present");
     }
     
     // Getting all elements
    for(String data : myString){
       System.out.println(data);
    }
    
    
  }
}