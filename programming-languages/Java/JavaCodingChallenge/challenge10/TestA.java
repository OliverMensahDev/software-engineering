/**
 * Question 3:
 * 
 * @author Udayan Khattry
 */
package challenge10;

public class TestA {
	public static void main(String[] args) {
		A a = new A();
		byte b1 = 5;
		byte b2 = 10;
		a.method1(b1, b2);
		
		short s1 = 100;
		short s2 = 200;
		a.method1(s1, s2);
		
		int i1 = 1000;
		int i2 = 2000;
		a.method1(i1, i2);
	}
}

