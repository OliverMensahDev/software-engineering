/**
 * Question 2:
 * Write a logic using switch case to print "EVEN" / "ODD" for the numbers. 
 * Numbers divisible by 2 are even and numbers not divisible by 2 are odd.
 * 
 * @author Udayan Khattry
 */
package challenge1;

public class Ques2 {
	public static void main(String[] args) {
		int num = 4;
		switch(num % 2) { // 4 % 2 == 0 -> 4 is even, 5 % 2 == 1 -> 5 is odd,
			case 0: 
				System.out.println("EVEN");
				break;
			default:
				System.out.println("ODD");
				break;
		}
	}
}

/*
OUTPUT:
4 -> EVEN
5 -> ODD
11 -> ODD
12 -> EVEN
*/