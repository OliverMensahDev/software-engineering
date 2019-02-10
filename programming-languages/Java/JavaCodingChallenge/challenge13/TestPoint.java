/**
 * Question 3:
 * On executing this class we are getting following output:
 * false
 * false
 * 
 * Expected output is:
 * true
 * false
 * 
 * Check Point.java for the solution.
 * 
 * @author Udayan Khattry
 */
package challenge13;

public class TestPoint {
	public static void main(String[] args) {
		Point p1 = new Point(5, 5);
		Point p2 = new Point(5, 5);
		Point p3 = new Point(4, 4);
		
		System.out.println(p1.equals(p2));
		System.out.println(p1.equals(p3));
	}
}
