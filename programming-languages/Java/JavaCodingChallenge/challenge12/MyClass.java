/**
 * Question 3:
 * 
 * You are NOT allowed to make any changes in MyClass.java file.
 * You are free to write any number of new classes. 
 * You have to write your code such that static initializer block of MyClass is invoked 
 * but constructor should not be invoked.
 * 
 * Final output should be:
 * Hello
 * 
 * @author Udayan Khattry
 */
package challenge12;

public class MyClass {
	static {
		System.out.println("Hello");
	}
	
	MyClass() {
		System.out.println("Constructor invoked");
	}
}
