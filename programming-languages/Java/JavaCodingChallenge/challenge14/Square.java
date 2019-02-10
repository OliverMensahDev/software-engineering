/**
 * Question 3: 
 * Square extends Shape and overrides area() and perimeter() methods.
 * 
 * @author Udayan Khattry
 */
package challenge14;

public class Square extends Shape {
	
	private double side;
	
	public Square(double side) {
		this.side = side;
	}
	
	@Override
	public void area() {
		System.out.println("Area of the square is: " + (side * side));
		
	}

	@Override
	public void perimeter() {
		System.out.println("Perimeter of the square is: " + (4 * side));
	}
	
}
