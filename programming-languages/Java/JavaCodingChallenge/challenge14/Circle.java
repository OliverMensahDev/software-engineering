/**
 * Question 3: 
 * Circle extends Shape and overrides area() and perimeter() methods.
 * 
 * @author Udayan Khattry
 */
package challenge14;

public class Circle extends Shape {
	
	private double radius;
	
	public Circle(double radius) {
		this.radius = radius;
	}
	
	@Override
	public void area() {
		double area = Math.PI * radius * radius;
		System.out.println("Area of the circle is: " + area);
	}

	@Override
	public void perimeter() {
		double perimeter = 2 * Math.PI * radius;
		System.out.println("Perimeter of the circle is: " + perimeter);
	}
	
}
