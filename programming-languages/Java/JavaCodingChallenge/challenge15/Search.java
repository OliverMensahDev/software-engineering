/**
 * Question 3: Solution.
 * 
 * @author Udayan Khattry
 */
package challenge15;

public class Search {
	public static void searchNames(String [] names, String nameToFind) {
		//1. Display the message in case nameToFind variable is null and return.
		if(nameToFind == null) {
			System.out.println("Search String should not be null.");
			return;
		}
		//2. Display the message in case names array is null.
		if(names == null) {
			System.out.println("Name list cannot be null.");
			return;
		}
		for(String name : names) {
			//3. If array elements are null, then name.equalsIgnoreCase(nameToFind) can throw NullPointerException.
			//Check if name is not null before calling any method on name reference variable
			if(name != null && name.equalsIgnoreCase(nameToFind)){
				System.out.println(nameToFind + " found in the list.");
				return;
			}
		}
		//4. If you reached here, this means name not found in the array (on successful finding, code is returning
		//from for loop).
		//Throw and instance of NameNotFoundException and pass the name (you are trying to find out)
		//as the parameter, so that Line no. 26 in TestSearch.java file 
		//[System.out.println(e.getMessage() + " not found!");] can display intended message.
		throw new NameNotFoundException(nameToFind);
	}
}
