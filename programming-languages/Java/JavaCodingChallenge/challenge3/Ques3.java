/**
 * Question 3:
 * Write a Java program to print all the numbers between 1 and 100 (including 1 and 100)
 * which are divisible by 5. 
 * 
 * @author Udayan Khattry
 */
package challenge3;

public class Ques3 {
	public static void main(String[] args) {
		//Check all the numbers between 1 and 100.
		for(int i = 1; i <= 100; i++) {
			if(i % 5 == 0){ //For numbers divisible by 5, i % 5 == 0.
				System.out.println(i);
			}
		}
	}
}
