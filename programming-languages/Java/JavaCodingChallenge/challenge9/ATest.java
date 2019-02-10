/**
 * Test class for challenge9.A
 * 
 * @author Udayan Khattry
 */
package challenge9;

public class ATest {
	public static void main(String[] args) {
		A a1 = new A(); //Create an instance of A using no-arg constructor
		a1.print(); //Call print() method of a1
		
		A a2 = new A("test"); //Create an instance of A using parameterized constructor
		a2.print(); //Call print() method on a2
		
		A a3 = new A(9876.000873); //Create an instance of A using parameterized constructor
		a3.print(); //Call print() method on a3
		
		A a4 = new A("test", 5.6); //Create an instance of A using parameterized constructor
		a4.print(); //Call print() method on a4
	}
}
