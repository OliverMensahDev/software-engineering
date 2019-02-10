/**
 * Question 3:
 * Following code creates an asymmetrical 2-Dimensional int array:
 * int [][] numbers = {
 * 		{90, 10, 231},
 * 		{-20, 80, 100, 23, 54},
 * 		{45, 22},
 * 		{87, 98, -100, 49, 73, 35, 19}
 * };
 * 
 * Write your logic to find out highest number in above array.
 * 
 * @author Udayan Khattry
 */
package challenge6;

public class Ques3 {
	public static void main(String[] args) {
		//Asymmetrical 2-Dimensional char array
		int [][] numbers = {
				{90, 10, 231},
				{-20, 80, 100, 23, 54},
				{45, 22},
				{87, 98, -100, 49, 73, 35, 19}
		};
		
		int max = numbers[0][0];//Store first array element (at row = 0, col = 0) to variable max
		for (int row = 0; row < numbers.length; row++) {
			for (int col = 0; col < numbers[row].length; col++) {
				//If value of max is less than current array element's value then
				//replace the value of max with current array element's value.
				if(max < numbers[row][col]) {
					max = numbers[row][col];
				}
			}
		}
		
		System.out.println("Highest number is: " + max);
	}
}

/*
OUTPUT:
Highest number is: 231

*/