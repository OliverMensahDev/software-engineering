/**
 * Question 1:
 * Write nested enhanced for-loop to iterate through following 2-Dimensional array:
 * char [][] arr = {
 * 		{'*'},
 * 		{'*', '*'},
 * 		{'*', '*', '*'},
 * 		{'*', '*', '*', '*'},
 * 		{'*', '*', '*', '*', '*'},
 * 		{'*', '*', '*', '*', '*', '*'},
 * 		{'*', '*', '*', '*', '*', '*', '*'},
 * };
 * 
 * Following output is expected:
 * *
 * **
 * ***
 * ****
 * *****
 * ******
 * *******
 * 
 * @author Udayan Khattry
 */
package challenge7;

public class Ques1 {
	public static void main(String[] args) {
		//Given char 2-Dimensional array
		char [][] arr = {
				{'*'},
				{'*', '*'},
				{'*', '*', '*'},
				{'*', '*', '*', '*'},
				{'*', '*', '*', '*', '*'},
				{'*', '*', '*', '*', '*', '*'},
				{'*', '*', '*', '*', '*', '*', '*'},
		};
		
		//Nested enhanced for-loop
		for(char [] row : arr) {
			for(char val : row) {
				System.out.print(val);
			}
			System.out.println(); // Code to print new line
		}
	}
}

/*
OUTPUT:

*
**
***
****
*****
******
*******

*/