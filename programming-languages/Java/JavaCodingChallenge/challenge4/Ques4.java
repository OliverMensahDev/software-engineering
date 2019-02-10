/**
 * Question 4:
 * Print following chess board using nested for loops.
 * W B W B W B W B 
 * B W B W B W B W 
 * W B W B W B W B 
 * B W B W B W B W 
 * W B W B W B W B 
 * B W B W B W B W 
 * W B W B W B W B 
 * B W B W B W B W 
 * 
 * NOTE: 
 * 1. Total 8 rows and 8 columns.
 * 2. "W" and "B" are in alternate positions (row-wise and column-wise),
 *    you will not find consecutive W or B.
 * 
 * @author Udayan Khattry
 */
package challenge4;

public class Ques4 {
	public static void main(String[] args) {
		for(int i = 1; i <= 8; i++) { //outer loop to print 8 rows
			for(int j = 1; j <= 8; j++) { //inner loop to print 8 columns in each row
				if ((i + j) % 2 != 0) {
					System.out.print("B" + " "); //Print B when sum of i + j is odd
				} else {
					System.out.print("W" + " "); //Print W when sum of i + j is even
				}
			} //inner for ends
			System.out.println(); //New line at the end of each row
		} //outer for ends
	}
}
