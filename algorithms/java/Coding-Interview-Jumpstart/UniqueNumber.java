import java.util.HashMap;
import java.util.Map;

public class UniqueNumber {
 // Map implemented with BST/Hashing
 // We will create a helper counting map, which will tell us for each
 // number, how many times does it appear.
 // count[i] = the number of occurrences of the number i in the input array
 // so far
 // Time: O(n)
 // Extra Space: O(n)
 public static int countingMap(int n, int[] array) {
  Map<Integer, Integer> count = new HashMap<>(); // new TreeMap<>();
  
  // Iterate through the array, and fill the count array
  for (int i = 0; i < n; i++) {
   int currentNumber = array[i];
   int prevCounter = 0;
   if (count.keySet().contains(currentNumber)) {
    prevCounter = count.get(currentNumber);
   }
   count.put(currentNumber, prevCounter + 1);
  }

  // Loop again through the array, and find element x, such that count[x]
  // = 1
  for (int i = 0; i < n; i++) {
   int currentNumber = array[i];
   if (count.get(currentNumber) == 1) {
    return currentNumber;
   }
  }

  return -1; // Invalid array
 }
 

 
 public static void main(String[] args) {
  int[] array = {2, 1, 1, 3, 3, 5, 5, 2, 9, 8, 8};
  int solution = countingMap(11, array);
  System.out.println(solution);
 }

}


