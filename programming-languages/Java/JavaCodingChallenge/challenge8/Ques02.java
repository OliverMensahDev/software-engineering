/**
 * Question 2:
 * Write a program to ask user to enter either Y or N. 
 * User can enter in lower case or upper case.
 * If user enters Y or y, then display “Welcome!” and terminate the program.
 * If user enters N or n, then display “Good Bye!” and terminate the program.
 * If user enters any other character, then display “Please provide correct input.” and ask user to enter either Y or N.
 * If user enters more than one character such as yes/no/abc, then display “Please provide only one character.” and ask user to enter either Y or N.
 * Program should not be terminated until user provides Y/y/N/n.
 * 
 * NOTE: Provide the solution under “challenge8” package and accept user input as String. 
 * You may have to user some methods of String class.
 * 
 * @author Udayan Khattry
 */
package challenge8;

import java.util.Scanner;

public class Ques02 {
	public static void main(String[] args) {
		//Create Scanner object linked to keyboard.
		Scanner scanner = new Scanner(System.in);
		
		//Infinite loop, we will exit the loop only when user's input is Y / y / N / n
		while(true) {
			System.out.print("Enter either Y/N: ");
			String str = scanner.nextLine(); //Accept input as String.
			if(str.length() != 1) {
				System.out.println("Please provide only one character.");
				continue; //Continue with the next iteration of the loop.
			}
			
			if(str.equalsIgnoreCase("y")) { //If user input is Y/y then, display Welcome! and exit the loop.
				System.out.println("Welcome!");
				break;
			} else if(str.equalsIgnoreCase("n")) { //If user input is N/n then, display Good Bye! and exit the loop.
				System.out.println("Good Bye!"); 
				break;
			} else { //If user input is other than Y/y/N/n, then display message and continue with the next iteration of the loop.
				System.out.println("Please provide correct input.");
				continue; //Even if we don't provide continue, control will go to the next iteration, as it is the last statement in the loop.
			}
		}
		scanner.close(); //close the scanner
	}
}
