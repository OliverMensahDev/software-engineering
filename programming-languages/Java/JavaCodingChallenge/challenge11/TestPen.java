/**
 * Question 1 - Solution:
 * 
 * @author Udayan Khattry
 */
package challenge11;

class Pen {
	public String inkColor;
	//1. The Pen class is for “Parker” pens only, which means all the pens are of Parker brand.
	/*
	 * As variable brand's value is fixed, so only one copy is sufficient. Make brand variable static.
	 * And value is assigned at the time of declaration only.
	*/
	public static String brand = "Parker";
	
	//2. You are not allowed to make any changes in Constructor or method parameters.
	/*
	 * Parameter name "inkColor" is same as instance variable's name "inkColor". Which means
	 * instance variable is shadowed by LOCAL variable (parameter variable), inkColor.
	 * So to refer to instance variable within the scope of parameterized constructor, this reference is used.
	 */
	public Pen(String inkColor) {
		this.inkColor = inkColor;
	}
	
	public void getDetails() {
		System.out.println(brand + " : " + inkColor);
	}
}

public class TestPen {
	public static void main(String[] args) {
		Pen pen1 = new Pen("Blue");
		Pen pen2 = new Pen("Black");
		pen1.getDetails();
		pen2.getDetails();
	}
}

