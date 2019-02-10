/**
 * Question 4 - Solution:
 * 
 * @author Udayan Khattry
 */
package challenge11;

public class RandomStaticValue {
	//new java.security.SecureRandom() returns an object of SecureRamnom class.
	//On this object, nextInt(int) method is invoked.
	//So, new java.security.SecureRandom().nextInt(6) returns a random number between 0 and 5
	//To get a random number between 1 and 6, 1 is added to the expression.
	//This concept is similar to method chaining concept taught in Section 7.
	public static int value = new java.security.SecureRandom().nextInt(6) + 1;
	
	public static void main(String [] args) {
		System.out.println("Random value between 1 and 6 is: " + value);
	}
}
