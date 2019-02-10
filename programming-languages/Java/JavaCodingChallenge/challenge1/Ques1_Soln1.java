/**
 * Question 1:
 * Write a java program for following logic.
 *	if marks < 60, then print "Failed"
 *	if marks >= 60 but less than 90 , then print "Passed"
 *	if marks >= 90, then print "Passed with Distinction"
 *
 * This solution uses if-statements only, not a very efficient solution
 * as all the if-statements are checked.
 * 
 * @author Udayan Khattry
 */
package challenge1;

public class Ques1_Soln1 {
	public static void main(String[] args) {
		int marks = 45;
		
		if(marks < 60) {
			System.out.println("Failed");
		}
		if(marks >= 60 && marks < 90) {
			System.out.println("Passed");
		}
		if(marks >= 90) {
			System.out.println("Passed with Distinction");
		}
	}
}

/*
OUTPUT:
45 -> Failed
65 -> Passed
95 -> Passed with Distinction
*/