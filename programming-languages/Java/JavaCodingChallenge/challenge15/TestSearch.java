/**
 * Question 3.
 * 
 * @author Udayan Khattry
 */
package challenge15;

public class TestSearch {
	public static void main(String[] args) {
		String[] names1 = { "Sachin", "Sourav", "Virat", "Ashvin", "Virendra", "Ashish" };
		findNames(names1, "virat");
		findNames(names1, "viraat");
		findNames(names1, null);

		String[] names2 = null;
		findNames(names2, "Sachin");

		String[] names3 = new String[2];
		findNames(names3, "sourav");
	}
	
	private static void findNames(String [] arr, String str) {
		try {
			Search.searchNames(arr, str);
		} catch(NameNotFoundException e) {
			System.out.println(e.getMessage() + " not found!");
		}
	}
}

