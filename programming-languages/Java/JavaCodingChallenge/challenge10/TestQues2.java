/**
 * Question 2:
 * Same as Question 1. 
 * java.util.Arrays class has various utility methods to work with Arrays. 
 * Instead of writing your own logic to sort the passed int [] object in the method, 
 * you have to use a method from java.util.Arrays class to solve it.
 * 
 * @author Udayan Khattry
 */
package challenge10;

import java.util.Arrays;

public class TestQues2 {
	public static void main(String[] args) {
		int [] arr = {8, 1000, -10, 76, 276, -876, 0, 19}; //Create an int array object.
		System.out.print("Array before sorting; ");
		Ques1.printIntArray(arr); //Print the array contents
		
		Arrays.sort(arr); //Sort the array using java.util.Arrays.sort(int []) method.
		
		System.out.print("Array after sorting; ");
		Ques1.printIntArray(arr); //Print the array contents
	}
}
