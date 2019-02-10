/**
 * Question2:
 * In this solution, I added 4 constructors.
 * I also initialized str to "JAVA" so that if I don't pass String value,
 * then it will be initialized to "JAVA".
 * But if I pass a String value, then str value will be overridden.
 * 
 * @author Udayan Khattry
 */
package challenge9;

public class A {
	public String str = "JAVA"; //If we don't pass String value then str should be initialized to "JAVA"
	public double val; //default value is 0.0
	
	/**
	 * As we had provided other constructors, so need to provide no-arg constructor.
	 * Otherwise A a1 = new A(); will fail.
	 */
	public A() {
		
	}
	
	/**
	 * Parameterized constructor.
	 * 
	 * @param s String value
	 */
	public A(String s) {
		str = s;
	}
	
	/**
	 * Parameterized constructor.
	 * 
	 * @param d double value
	 */
	public A(double d) {
		val = d;
	}
	
	/**
	 * Parameterized constructor.
	 * 
	 * @param s String value
	 * @param d double value
	 */
	public A(String s, double d) {
		str = s;
		val = d;
	}
	
	/**
	 * Prints the value of str and val on to the console.
	 */
	public void print() {
		System.out.println("str: " + str + ", val: " + val);
	}
}
