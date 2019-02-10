/**
 * Question 3:
 * Below is One-dimensional array code:
 * char arr [] = new char[] {'A', 'Z', 'B', 'N', 'P', 'T', 'X', 'C'};
 * 
 * Write the code to search for particular character in above array.
 * If I search for 'B', then output should be: "B found!"
 * If I search for 'E', then output should be: "E Not found!"
 * 
 * @author Udayan Khattry
 */
package challenge5;

public class Ques3 {
	public static void main(String[] args) {
		char arr [] = new char[] {'A', 'Z', 'B', 'N', 'P', 'T', 'X', 'C'};
		char searchChar = 'B';
		boolean found = false; // variable "found" initially false, when particular char is found in array it is set to true.
		// for loop to iterate through all the array elements
		for(int i = 0; i < arr.length; i++) {
			if(arr[i] == searchChar) { // Logic to match the character.
				found = true; // Set found to true
				break; // If a particular character found, exit out of the for loop.
			}
		}
		
		//Show the result on to the console.
		if(found) {
			System.out.println(searchChar + " found!");
		} else {
			System.out.println(searchChar + " Not found!");
		}
	}
}

/*
OUTPUT:
'B' -> B found!
'E' -> E Not found!
*/
