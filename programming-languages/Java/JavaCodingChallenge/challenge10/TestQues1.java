/**
 * Question 1: Test class.
 * 
 * @author Udayan Khattry
 */
package challenge10;

public class TestQues1 {
	public static void main(String[] args) {
		int [] arr = {8, 1000, -10, 76, 276, -876, 0, 19}; //Create an int array object.
		System.out.print("Array before sorting; ");
		Ques1.printIntArray(arr); //Print the array contents
		
		Ques1.sort(arr); //Sort the array
		
		System.out.print("Array after sorting; ");
		Ques1.printIntArray(arr); //Print the array contents
	}
}
