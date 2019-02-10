/**
 * Question 4:
 * Write a java program for following logic.
 *	if marks < 60, then print "Failed"
 *	if marks >= 60 but less than 90 , then print "Passed"
 *	if marks >= 90, then print "Passed with Distinction"
 *
 * This solution uses ternary operator (?:), though bit confusing but interesting
 * and helpful in learning the concepts.
 * 
 * @author Udayan Khattry
 */
package challenge1;

public class Ques4 {
	public static void main(String[] args) {
		int marks = 45;
		/*
		 * If marks >= 90, result = "Passed with Distinction"
		 * If marks < 90, result = (marks >= 60) ? "Passed" : "Failed" [Another ternary operator]
		 * 		If marks >= 60, result = "Passed"
		 * 		If marks < 60, result = "Failed"
		 */
		String result = (marks >= 90) ? "Passed with Distinction" 
						: (marks >= 60) ? "Passed" 
						: "Failed";
		System.out.println(result);
		
		//Logic is same as below if - else if - else statement
		String res;
		if(marks >= 90) {
			res = "Passed with Distinction";
		} else if (marks >= 60) {
			res = "Passed";
		} else {
			res = "Failed";
		}
		System.out.println(res);
	}
}

/*
OUTPUT:
45 -> Failed
65 -> Passed
95 -> Passed with Distinction
*/