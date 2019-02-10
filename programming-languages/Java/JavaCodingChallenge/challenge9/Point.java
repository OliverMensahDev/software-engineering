/**
 * Question 1:
 * A 2-dimensional point represents a location in (x,y) co-ordinate space.
 * 
 * Create a Point class, which will have two fields of int type: x and y.
 * User should be able to create Point instances in following ways:
 * a) Pass x and y co-ordinate values at the time of initialization.
 * b) If x and y values are not passed, then both x and y should be 0.
 * 
 * Provide the printPoint() method, which should print "Point: (x, y)" on to the console, x and y should get replaced by values at runtime.
 * 
 * @author Udayan Khattry
 */
package challenge9;

public class Point {
	public int x; //default value 0
	public int y; //default value 0
	
	/**
	 * No-arg constructor.
	 * We need no-arg constructor to create Point instance which has x=0 and y=0.
	 */
	public Point() {
		
	}
	
	/**
	 * Parameterized constructor.
	 * 
	 * @param x1 value to be assigned to x
	 * @param y1 value to be assigned to y
	 */
	public Point(int x1, int y1) {
		x = x1;
		y = y1;
	}
	
	/**
	 * Prints the point instance. If value of x is 3 and y is 4, then it prints following:
	 * Point: (3, 4)
	 */
	public void printPoint() {
		System.out.println("Point: (" + x + ", " + y + ")");
	}
}
