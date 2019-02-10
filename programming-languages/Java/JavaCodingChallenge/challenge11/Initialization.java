/**
 * Question 5 - Solution:
 * 
 * @author Udayan Khattry
 */
package challenge11;

public class Initialization {
	/*
	 * Step 2: Can't make this block as static as static initialization blocks are executed in sequence.
	 * If we make this block static then in the output 5 will be printed first.
	 * We are also restricted to change code's location.
	 * 
	 * This block will get executed on object creation of Initialization class.
	 */
	{
		System.out.println(5);
	}
	
	/*
	 * Step 1: As output should print 4 first and then 5 so make below initialization block as static.
	 * 
	 * This block will get executed when JVM invokes main method, which is defined in Initialization class.
	 */
	static {
		System.out.println(4);
	}
	
	public static void main(String[] args) {
		new Initialization(); //calls instance initialization block
	}
}


