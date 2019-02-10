/**
 * Question 2:
 * Write a java program to create following 2-Dimensional array 
 * of 8 * 8 size [to resemble chess board] using Data instantiation:
 * 
 * W	B	W	B	W	B	W	B
 * B	W	B	W	B	W	B	W
 * W	B	W	B	W	B	W	B
 * B	W	B	W	B	W	B	W
 * W	B	W	B	W	B	W	B
 * B	W	B	W	B	W	B	W
 * W	B	W	B	W	B	W	B
 * B	W	B	W	B	W	B	W
 * 
 * Write a nested for loop to print all the elements of 2-Dimensional array in above format.
 * 
 * @author Udayan Khattry
 */
package challenge6;

public class Ques2 {
	public static void main(String[] args) {
		//Instantiation 2-Dimensional char array of 8 * 8 using data.
		char [][] board = {
				{'W', 'B', 'W', 'B', 'W', 'B', 'W', 'B'},
				{'B', 'W', 'B', 'W', 'B', 'W', 'B', 'W'},
				{'W', 'B', 'W', 'B', 'W', 'B', 'W', 'B'},
				{'B', 'W', 'B', 'W', 'B', 'W', 'B', 'W'},
				{'W', 'B', 'W', 'B', 'W', 'B', 'W', 'B'},
				{'B', 'W', 'B', 'W', 'B', 'W', 'B', 'W'},
				{'W', 'B', 'W', 'B', 'W', 'B', 'W', 'B'},
				{'B', 'W', 'B', 'W', 'B', 'W', 'B', 'W'},
		};
		
		System.out.println("Printing 2-D array of 8 x 8:");
		// Print above array
		for (int i = 0; i < board.length; i++) {
			for (int j = 0; j < board[i].length; j++) {
				System.out.print(board[i][j] + "  ");
			}
			System.out.println();// Code to print new line
		}
	}
}

/*
OUTPUT:
Printing 2-D array of 8 x 8:
W  B  W  B  W  B  W  B  
B  W  B  W  B  W  B  W  
W  B  W  B  W  B  W  B  
B  W  B  W  B  W  B  W  
W  B  W  B  W  B  W  B  
B  W  B  W  B  W  B  W  
W  B  W  B  W  B  W  B  
B  W  B  W  B  W  B  W  

*/