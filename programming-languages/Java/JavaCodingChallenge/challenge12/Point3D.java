/**
 * Question 2: Solution
 * A class to represent a point in 3-dimensional space.
 * 
 * @author Udayan Khattry
 */
package challenge12;

public class Point3D extends Point2D { //Change 1: Point3D inherits Point2D
	private int z;
	
	public Point3D(int x, int y, int z) {
		super(x, y); //Change 2: Call constructor of parent class.
		this.z = z;
	}
	
	public int getZ() {
		return z;
	}
	
	@Override
	public String toString() {
		String res = "(" + super.getX() + ", " + super.getY() + ", " + z + ")"; //Change 3: Concatenate the co-ordinates as per the format
		return res;
	}
}
