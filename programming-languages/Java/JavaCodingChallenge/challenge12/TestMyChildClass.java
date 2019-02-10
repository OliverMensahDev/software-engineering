/**
 * Question 3: Solution.
 * 
 * @author Udayan Khattry
 */
package challenge12;

public class TestMyChildClass {
	public static void main(String[] args) {
		//When we invoke static method m1() of MyChildClass,  
		//it first needs to be loaded in the memory.
		//But as MyChildClass extends from MyClass, hence MyClass
		//first gets loaded in the memory and static initializer block
		//of MyClass gets executed. Thus it prints "Hello" on to the Console.
		//Then MyChildClass gets loaded in the memory.
		//Method m1() is blank, so it does nothing.
		MyChildClass.m1();
	}
}
