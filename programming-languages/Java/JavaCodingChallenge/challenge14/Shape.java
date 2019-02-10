/**
 * Question 3: Solution
 * As Circle extends Shape and Square extends Shape, hence Shape
 * can only be a class and not interface.
 * 
 * TestShape class invokes area() and perimeter() methods on Shape reference variable,
 * hence these methods needs to be defined in this class.
 * 
 * We have an idea to calculate the area are perimeter of Circle, Square, Rectangle etc.
 * but no idea to calculate area and perimeter of any Shape. So area() and perimeter() are
 * declared abstract in this case.
 * 
 * @author Udayan Khattry
 */
package challenge14;

public abstract class Shape {
	public abstract void area();
	public abstract void perimeter();
}
