/**
 * Question 3: Test class.
 * 
 * @author Udayan Khattry
 */
package challenge14;

public class TestShape {
	public static void main(String[] args) {
		Shape s1 = new Circle(5.5);
		s1.area();
		s1.perimeter();
		
		Shape s2 = new Square(10.5);
		s2.area();
		s2.perimeter();
	}
}
