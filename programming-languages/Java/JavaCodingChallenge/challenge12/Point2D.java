/**
 * Question 2: 
 * A class to represent a point in 2-dimensional space.
 * 
 * @author Udayan Khattry
 */
package challenge12;

public class Point2D {
	private int x;
	private int y;
	
	public Point2D(int x, int y) {
		this.x = x;
		this.y = y;
	}

	public int getX() {
		return x;
	}

	public int getY() {
		return y;
	}
	
	@Override
	public String toString() {
		return "(" + x + ", " + y + ")";
	}
}
