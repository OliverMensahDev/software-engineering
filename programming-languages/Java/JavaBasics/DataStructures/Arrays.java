// Data Structures: Mechanism of organizing data in your code.

public class Arrays {
  
  public static void main(String[] args) {
    //Arrays
    //Collection of elements of the same data types.
    // It must have a fixed number of elements which means once it's full you cannot add more
    //It can be delared in two ways 
    // One way
    int[] myArray = {1, 2, 3, 4, 5, 6, 7};
    //myArray[7] = 8;  // We can't do this here because the array has a fixed size.
    // String [] mydata = {"Age", 2, 4.0}; It is wrong to work with different data types in array
    
    // Retrieving elements from array 
    // To retrieve from array we use index which starts from 0.
    System.out.println("Getting index 0 element: "+ myArray[0]);
    System.out.println("Total elements in array: " + myArray.length);
    
    //Getting all elements from an array with a loop: for, foreach, while;
    //for loop
    int total_elements_in_Array = myArray.length;
    for(int i = 0; i < total_elements_in_Array ;i++){
      int sumby2 = myArray[i] + 2;
      System.out.println(sumby2);
    } 
    // Get each element and prepend each with Good Morning. Eg. Good Morning Hello
    String[] myStringArray = {"Hello", "Hi", "What"};
    int totalElements = myStringArray.length;
    for(int i =0; i < totalElements; i +=1) {
      String data = "Good Morning " + myStringArray[i];
      System.out.println(data);
    }
    
    //  Another Way 
    int[] myIntArray = new int[5];
    //int[] myArray = {10, 20, 30, 40,50};
    myIntArray[0] = 10;
    myIntArray[1] = 20;
    myIntArray[2] = 30;
    myIntArray[3] = 40;
    myIntArray[4] = 50;
    
    // Get each element and multiply it by 100 and divide the result by 5;
    // using for 
    totalElements = myIntArray.length;
    for(int i =0; i < totalElements; i +=1) {
      int data =  (myIntArray[i] * 100) / 5;
      System.out.println("For " + data);
    }
    //for each 
    for(int data : myIntArray) {
      int result = (data * 100) / 5;
      System.out.println("For each Approach " + result);
    }
    
    // while loop
    int startingIndex = 0;
    while( startingIndex < totalElements ) {
      int result = (myIntArray[startingIndex] * 100) / 5;
      System.out.println("While Loop Approach " + result);
      startingIndex++;
    }
  }
}
