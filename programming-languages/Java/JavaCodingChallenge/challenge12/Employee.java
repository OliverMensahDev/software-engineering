/**
 * Question 1: Solution
 * 
 * Employee class.
 * Made following changes.
 * 1. Made instance variables private.
 * 2. Provided getter and setter for salary and organization. [Generated code]
 * 3. Provided getter for name, no setter for name. [Generated code]
 * 4. Added parameterized constructor to initialize instance variables. [Generated code]
 * 5. toString() method is overridden.
 * 
 * @author Udayan Khattry
 */
package challenge12;

public class Employee {
	private String name;
	private double salary;
	private String organization;
	
	//Constructor
	public Employee(String name, double salary, String organization) {
		this.name = name;
		this.salary = salary;
		this.organization = organization;
	}
	
	public double getSalary() {
		return salary;
	}

	public void setSalary(double salary) {
		this.salary = salary;
	}

	public String getOrganization() {
		return organization;
	}

	public void setOrganization(String organization) {
		this.organization = organization;
	}

	public String getName() {
		return name;
	}
	
	//No setter method for name as it cannot be changed.
	
	@Override
	public String toString() {
		return "Employee: [" + name + ", " + salary + ", " + organization + "]";
	}
	
}
