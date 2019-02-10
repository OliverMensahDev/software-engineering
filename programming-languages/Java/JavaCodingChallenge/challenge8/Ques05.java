/**
 * Question 5:
 * Write a program to accept an int value from the user until user provides 0.
 * Display the same value in the output.
 * For non-zero values, re-run the logic.
 * 
 * NOTE: Use of do-while loop is must in the logic.
 * 
 * @author Udayan Khattry
 */
package challenge8;

import java.util.Scanner;

public class Ques05 {
	public static void main(String[] args) {
		//Create Scanner object linked to keyboard.
		Scanner scanner = new Scanner(System.in);
		int i;
		
		do {
			System.out.print("Enter 0 to exit: ");
			i = scanner.nextInt();
			System.out.println("You entered: " + i);
		} while(i != 0); //Boolean expression checks input value from the user.
		
		scanner.close(); //Close the scanner
	}
}
