/**
 * Question 5: Solution.
 * 
 * @author Udayan Khattry
 */
package challenge15;

import java.io.IOException;

public class Question05 {
	public static void main(String[] args) {
		Question05 obj = new Question05();
		try {
			obj.test1();
		} catch(RuntimeException ex) { //Point 2. NullPointerException is a sub class of RuntimeException
			System.out.println(ex.getMessage()); //Point 1. This should print "Java Exception Framework.
		}
	}
	
	private void test1() {
		test2();
	}
	
	private void test2() {
		test3();
	}
	
	private void test3() {
		IOException ex = new IOException("Java Exception Framework");
		NullPointerException e = null;
		//Point 3. We have to pass "Java Exception Framework" to the calling code.
		//Get this message from IOException instance and pass it in the 
		//NullPointerException constructor's parameter.
		e = new NullPointerException(ex.getMessage());
		throw e;
	}
}
