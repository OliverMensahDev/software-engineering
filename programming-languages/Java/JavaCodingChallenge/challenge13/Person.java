/**
 * Question 2: Solution
 * We have to override equals(Object) method in this class.
 * 
 * @author Udayan Khattry
 */
package challenge13;

public class Person {
	private String firstName;
	private String lastName;
	
	public Person(String firstName, String lastName) {
		this.firstName = firstName;
		this.lastName = lastName;
	}

	public String getFirstName() {
		return firstName;
	}

	public String getLastName() {
		return lastName;
	}
	
	@Override
	public boolean equals(Object obj) {
		if(obj instanceof Person) {
			Person person = (Person) obj;
			String fName = person.firstName; //Passed object's firstName
			String lName = person.lastName; //Passed object's lastName
			//if passed object's firstName and lastName matches, then two Person objects are considered equal.
			//NOTE: which matching firstName and lastName, case is ignored.
			if(fName.equalsIgnoreCase(this.firstName) && lName.equalsIgnoreCase(this.lastName)) {
				return true;
			}
		}
		return false;
	}
}
