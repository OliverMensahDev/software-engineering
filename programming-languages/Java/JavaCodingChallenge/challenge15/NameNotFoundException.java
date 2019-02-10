/**
 * Question 3: Solution.
 * 
 * @author Udayan Khattry
 */
package challenge15;

public class NameNotFoundException extends RuntimeException {
	public NameNotFoundException() {
		super();
	}
	
	//5. Provide the parameterized constructor, so that Line no. 26 in TestSearch.java
	//[System.out.println(e.getMessage() + " not found!");] gives proper cause.
	public NameNotFoundException(String s) {
		super(s);
	}
}
