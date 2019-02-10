/**
 * Question 1:
 * Print following output using nested for loops.
 * 1
 * 22
 * 333
 * 4444
 * 55555
 * 666666
 * 7777777
 * 
 * @author Udayan Khattry
 */
package challenge4;

public class Ques1 {
	public static void main(String[] args) {
		for (int i = 1; i <= 7; i++) { //outer loop for 7 rows
			for(int j = 1; j <= i; j++) { //inner loop
				System.out.print(i);
			}
			System.out.println(); //New line at the end of each row
		}
	}
}
