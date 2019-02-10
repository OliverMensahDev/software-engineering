/**
 * Question 3:
 * Write a logic using ternary operator (?:) to print "EVEN" / "ODD" for the numbers. 
 * Numbers divisible by 2 are even and numbers not divisible by 2 are odd.
 * 
 * @author Udayan Khattry
 */
package challenge1;

public class Ques3 {
	public static void main(String[] args) {
		int num = 4;
		String res = (num % 2 == 0) ? "EVEN" : "ODD";
		System.out.println(res);
	}
}

/*
OUTPUT:
4 -> EVEN
5 -> ODD
11 -> ODD
12 -> EVEN
*/