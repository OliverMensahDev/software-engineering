/**
 * Question 1:
 * Write a java program for following logic.
 *	if marks < 60, then print "Failed"
 *	if marks >= 60 but less than 90 , then print "Passed"
 *	if marks >= 90, then print "Passed with Distinction"
 *
 * This solution uses if-else statements only, as few conditions to check
 * hence we can use if-else without increasing the complexity.
 * 
 * @author Udayan Khattry
 */
package challenge1;

public class Ques1_Soln2 {
	public static void main(String[] args) {
		int marks = 45;
		
		if(marks < 60) {
			System.out.println("Failed");
		}
		else { //else means marks >= 60
			if(marks < 90) { //includes marks >= 60 check
				System.out.println("Passed");
			}
			else { //equivalent to marks >= 90
				System.out.println("Passed with Distinction");
			}
		}
	}
}

/*
OUTPUT:
45 -> Failed
65 -> Passed
95 -> Passed with Distinction
*/