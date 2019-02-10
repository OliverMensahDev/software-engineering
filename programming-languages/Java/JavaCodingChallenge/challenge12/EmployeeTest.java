/**
 * Question 1: Solution
 * 
 * EmployeeTest class to create Employee class objects.
 * Employee class is properly encapsulated with private instance variables and 
 * public getter and setter methods.
 * 
 * @author Udayan Khattry
 */
package challenge12;

public class EmployeeTest {
	public static void main(String[] args) {
		Employee e1 = new Employee("Udayan", 500000, "XYZ Corp.");
		System.out.println(e1);
		
		Employee e2 = new Employee("Peter", 100000, "XYZ Corp.");
		System.out.println(e2);
	}
}
