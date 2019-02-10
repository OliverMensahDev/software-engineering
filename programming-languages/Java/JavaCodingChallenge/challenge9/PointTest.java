/**
 * Test class for challenge9.Point class.
 * 
 * @author Udayan Khattry
 */
package challenge9;

public class PointTest {
	public static void main(String[] args) {
		Point p1 = new Point(3, 4); //Create Point instance using parameterized constructor
		p1.printPoint(); //Call printPoint() method on Point instance referred by p1
		
		Point p2 = new Point(-100, 0); //Create Point instance using parameterized constructor
		p2.printPoint(); //Call printPoint() method on Point instance referred by p2
		
		Point p3 = new Point(); //Create Point instance using no-arg constructor
		p3.printPoint(); //Call printPoint() method on Point instance referred by p3
	}
}
/*
OUTPUT:
Point: (3, 4)
Point: (-100, 0)
Point: (0, 0)
*/