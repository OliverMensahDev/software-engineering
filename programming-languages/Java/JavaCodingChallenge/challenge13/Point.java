/**
 * Question 3: Solution.
 * In the original file spelling of equals was wrong, it was spelled as "eqauls".
 * Which means equals(Object) method was not overridden in the Point class.
 * In fact, in Eclipse IDE you will find that green triangle is missing for eqauls(Object) method.
 * 
 * So in TestPoint class, p1.equals(p2) -> invoked the equals(Object) method from Object class,
 * which compares the references and not contents and that is why p1.equals(p2) returned false.
 * 
 * @author Udayan Khattry
 */
package challenge13;

public class Point {
	private int x;
	private int y;
	
	public Point(int x, int y) {
		this.x = x;
		this.y = y;
	}
	
	public boolean equals(Object obj) { //Corrected the spelling from "eqauls" to "equals"
		if(obj instanceof Point) {
			Point p = (Point) obj;
			if(p.x == this.x && p.y == this.y) {
				return true;
			}
		}
		return false;
	}
}
