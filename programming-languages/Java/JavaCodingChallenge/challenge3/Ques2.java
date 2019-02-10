/**
 * Question 2:
 * Print the table of 12 using while loop.
 * Output should be in following format:
 *	12 X 1 = 12
 *	12 X 2 = 24
 *	12 X 3 = 36
 *	12 X 4 = 48
 *	12 X 5 = 60
 *	12 X 6 = 72
 *	12 X 7 = 84
 *	12 X 8 = 96
 *	12 X 9 = 108
 *	12 X 10 = 120
 * 
 * @author Udayan Khattry
 */
package challenge3;

public class Ques2 {
	public static void main(String[] args) {
		int tableOf = 12;
		
		int i = 0; //Initialized to 0
		
		//I used pre-increment operator, when boolean condition is checked for the
		//first time, value of i is 1. So I used the condition <= 10
		while(++i <= 10) {
			System.out.println(tableOf + " X " + i + " = " + tableOf * i);
		}
		
		
		System.out.println("-----------------------");
		
		//OR
		
				
		int j = 0; //Initialized to 0
		
		//Here, I used post-increment operator, when boolean condition is checked for the 
		//first time, value of i is 0. So I used the condition < 10
		while(j++ < 10) {
			System.out.println(tableOf + " X " + j + " = " + tableOf * j);
		}
	}
}
