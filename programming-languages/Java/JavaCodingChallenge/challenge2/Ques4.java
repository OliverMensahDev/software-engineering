/**
 * Write a program for following logic:
 *   Print all the odd numbers in comma separated form from 1 till end (you may change it):
 *   if end = 10, OUTPUT = 1, 3, 5, 7, 9
 *   if end = 11, OUTPUT = 1, 3, 5, 7, 9, 11
 * 
 * You should use while loop and if - else statements.
 * 
 * @author Udayan Khattry
 */
package challenge2;

public class Ques4 {
	public static void main(String[] args) {
		int start = 1;
		int end = 10;
		
		while (start <= end) {
			if(start % 2 != 0){
				System.out.print(start);
				
				//Logic to add comma
				if(end % 2 == 0){ //If end is an even number
					if(start != (end - 1)) { //check to not add , after printing last number
						System.out.print(", ");
					}
				} else { //If end is an odd number
					if(start != end) { //check to not add , after printing last number
						System.out.print(", ");
					}
				}
			}
			start++;
		}
	}
}
