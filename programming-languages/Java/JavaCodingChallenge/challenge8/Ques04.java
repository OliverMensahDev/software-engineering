/**
 * Question 4:
 * Write a program to accept an int value from the user until user provides 0.
 * Display the same value in the output.
 * For non-zero values, re-run the logic.
 * 
 * NOTE: Use of while loop is must in the logic.
 * 
 * @author Udayan Khattry
 */
package challenge8;

import java.util.Scanner;

public class Ques04 {
	public static void main(String[] args) {
		//Create Scanner object linked to keyboard.
		Scanner scanner = new Scanner(System.in);
		
		while(true) { //Infinite loop, Boolean expression is always true
			System.out.print("Enter 0 to exit: ");
			int i = scanner.nextInt();
			System.out.println("You entered: " + i);
			if(i == 0) { //Check for the user's input value
				break;
			}
		}
		
		scanner.close(); //Close the scanner
	}
}
