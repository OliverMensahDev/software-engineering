/**
 * Question 1:
 * Write a java program for following logic.
 *	if marks < 60, then print "Failed"
 *	if marks >= 60 but less than 90 , then print "Passed"
 *	if marks >= 90, then print "Passed with Distinction"
 *
 * This solution uses if, else if and else statements, logic is similar to Ques1_Soln2
 * but it is more readable.
 * 
 * @author Udayan Khattry
 */
package challenge1;

public class Ques1_Soln3 {
	public static void main(String[] args) {
		int marks = 45;
		
		if(marks < 60) {
			System.out.println("Failed");
		} else if (marks < 90) { //includes marks >= 60, no need to write it
			System.out.println("Passed");
		} else { //equivalent to marks >= 90
			System.out.println("Passed with distinction.");
		}
	}
}

/*
OUTPUT:
45 -> Failed
65 -> Passed
95 -> Passed with Distinction
*/