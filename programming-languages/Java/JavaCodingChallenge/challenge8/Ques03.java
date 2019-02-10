/**
 * Question 3:
 * Write a program that simulates rolling a pair of dice. 
 * Roll of 1st die will give a number between 1 and 6. 
 * Roll of 2nd die will also give a number between 1 and 6. You can use java.security.SecureRandom class 
 * to get the numbers for both the dice. Their sum can be number between 2 and 12. 
 * 
 * At the start ask the user to guess a number between 2 and 12. Then roll both the dice and if their 
 * sum matches with the guessed number then we have a winner. Display greetings and exit the program. 
 * 
 * But if their sum doesn’t match, then ask user, if he would like to play again. 
 * If his answer is n, then exit the program but if his answer is y then re-run the same logic.
 * 
 * @author Udayan Khattry
 */
package challenge8;

import java.security.SecureRandom;
import java.util.Scanner;

public class Ques03 {
	public static void main(String[] args) {
		//Create Scanner object linked to keyboard.
		Scanner scanner = new Scanner(System.in);
		
		SecureRandom rn = new SecureRandom(); //Will be used in simulating rolling a pair of dice
		
		//Infinite loop, it ends if user wins OR based on user input.
		while(true) {
			System.out.print("Guess a number between 2 and 12: ");
			int num = scanner.nextInt();
			if(num < 2 || num > 12) { //If guessed number is not between 2 and 12, then ask him to guess again.
				continue;
			}
			scanner.nextLine();//Consume the newline character left by nextInt() method as I have to use nextLine() later.
			System.out.println("To win you have to score " + num);
			System.out.print("Press Enter to roll the dice...");
			scanner.nextLine(); //No need to process the captured String
			
			int dice1 = rn.nextInt(6) + 1; //This simulates rolling 1st dice and will result in any number between 1 and 6. 
			int dice2 = rn.nextInt(6) + 1; //This simulates rolling 2nd dice and will result in any number between 1 and 6.
			int sum = dice1 + dice2;
			if(sum == num) { //If sum of both the dice matches with the guessed number, show greetings and break the loop.
				System.out.println("Congratulations!!!! Collect prize money at the counter.");
				break;
			} else { //If sum of both the dice doesn't match with the guessed number, then ask user if he wants to play again.
				System.out.print("Your score: " + sum + ". Sorry you lost, would you like to play again? (y/n): ");
				String str = scanner.nextLine();
				//YOU CAN HAVE MORE CHECKS OVER HERE FOR USER INPUT.
				if(str.equalsIgnoreCase("y")) { //If user provides Y/y then continue
					continue;
				} else { //If user provides anything other than Y/y then exit the loop.
					break;
				}
			}
		}
		scanner.close(); //close the scanner.
	}
}
