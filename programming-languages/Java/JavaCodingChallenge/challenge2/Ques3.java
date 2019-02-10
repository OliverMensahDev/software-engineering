/**
 * Question 3:
 * Write a program using while loop to print Even numbers from 1 to 100.
 * 
 * @author Udayan Khattry
 */
package challenge2;

public class Ques3 {
	public static void main(String[] args) {
		int start = 1;
		int end = 100;
		//Check all the numbers starting from start(1) till end(100)
		//If number is divisible by 2, print the number to the console otherwise leave it.
		while (start <= end) {
			if(start % 2 == 0) {
				System.out.println(start);
			}
			start++;
		}
	}
}
