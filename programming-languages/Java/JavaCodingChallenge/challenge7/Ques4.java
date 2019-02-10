/**
 * Question 4:
 * Write a java program to accept more than 1 digits as command-line arguments and display the highest digit to the user. 
 * 
 * For example, if user passes 9, 14, 0, 23, 98, 2, 45 
 * Output should be: Highest digit is: 98
 * 
 * @author Udayan Khattry
 */
package challenge7;

public class Ques4 {
	public static void main(String[] args) {
		if (args.length <= 1) {
			System.out.println("Pass at least 2 numbers.");
			return;
		}
		
		// Create integer array of the same length as of String args array.
		int[] arr = new int[args.length];
		
		// Command line arguments are String values.
		// Below loop stores passed values in the integer array.
		for (int i = 0; i < args.length; i++) {
			arr[i] = Integer.parseInt(args[i]); // Convert String to Integer
		}
		
		int max = arr[0]; // assign first number as max
		for(int n = 1; n < arr.length; n++) { //Iterate from 2nd element onwards
			if(max < arr[n]) {
				max = arr[n];
			}
		}
		System.out.println("Highest number is: " + max);
	}
}
