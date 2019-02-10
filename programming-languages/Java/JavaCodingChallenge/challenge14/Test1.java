/**
 * Question 2:
 * obj is of supertype (I1) and it refers to an instance of subtype (C1).
 * obj.m1(); -> compiler checks if m1() is available in I1 or not.
 * abstract and default methods can be invoked using obj reference but static methods
 * can only be invoked by using interface name I1.m1() and hence the compilation error.
 * 
 * But we are not allowed to make changes in this class. 
 * 
 * @author Udayan Khattry
 */
package challenge14;

public class Test1 {
	public static void main(String[] args) {
		I1 obj = new C1();
		obj.m1();
	}
}
