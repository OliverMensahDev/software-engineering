/**
 * Question 2:
 * Write a program to calculate the sum of the numbers from 1 till upper bound. 
 *  If upper bound is 5, sum should be 1 + 2 + 3 + 4 + 5 = 15.
 *  If upper bound is 11, sum should be 1 + 2 + ... + 11 = 66.
 *  If upper bound is 100, sum should be 1 + 2 + ... + 100 = 5050.
   
 *  You should use while loop.
 * 
 * @author Udayan Khattry
 */
package challenge2;

public class Ques2 {
	public static void main(String[] args) {
		final int upperBound = 5;//Compile time constant, no need to change at runtime
		int ctr = 1;//Sum should start with 1 till upperBound
		int sum = 0;//Variable to store sum of the numbers
		while (ctr <= upperBound) {
			sum += ctr; //identical to sum = sum + ctr;
			ctr++;
		}
		System.out.println("Sum of the numbers from 1 to " + upperBound + " is: " + sum);
	}
}
