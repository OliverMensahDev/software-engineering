/**
 * Question 1:
 * Use pre-decrement operator in while's boolean_expression to print HELLO 
 * 5 times on to the console.
 * 
 * @author Udayan Khattry
 */
package challenge2;

public class Ques1 {
	public static void main(String[] args) {
		int ctr = 5; //Initialize ctr to 5
		while(--ctr >= 0) { // --ctr > -1 also works fine, iterates loop from 4 till 0.
			System.out.println("HELLO");
		}
	}
}
