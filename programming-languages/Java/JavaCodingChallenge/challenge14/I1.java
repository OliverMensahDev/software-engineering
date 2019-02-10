/**
 * Question 2: Solution.
 * 
 * @author Udayan Khattry
 */
package challenge14;

public interface I1 {
	//Solution 1: Change static to default, so that class C1 can override it.
	default void m1() {
		System.out.println("I1: m1()");
	}
	
	//Solution 2: Make method m1() abstract, so that class C1 and implement it.
	//void m1();
}
