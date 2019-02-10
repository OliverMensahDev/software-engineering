/**
 * Question 1: Solution.
 * 
 * @author Udayan Khattry
 */
package challenge16;

public class Ques01 {
	public static void main(String[] args) {
		//Below array contains full names in the format: "<Family_name/Surname>, <First_name>"
		String [] fullNames = {
				"Khattry, Udayan",
				"Schildt, Herbert",
				"Pitt, Brad",
				"Hanks, Tom",
		};
		
		System.out.println("Printing Family names: ");
		printFamilyNames(fullNames);
		
		System.out.println("*********************");
		
		System.out.println("Printing First names: ");
		printFirstNames(fullNames);
	}
	
	//Extracts and prints all the family names.
	private static void printFamilyNames(final String [] names) {
		if(names != null && names.length > 0) { //Check if array is not null and it contains elements.
			for(String name : names) {
				if(name != null) { //Check if array elements are not null
					int index = name.indexOf(","); //Returns the index of the the first occurrence of ","
					System.out.println(name.substring(0, index)); //Extract substring from 0 till (index - 1)
				}
			}
		}
	}
	
	//Extracts and prints all the first names.
	private static void printFirstNames(final String [] names) {
		if(names != null && names.length > 0) { //Check if array is not null and it contains elements.
			for(String name : names) {
				if(name != null) { //Check if array elements are not null
					int index = name.indexOf(","); //Returns the index of the the first occurrence of ","
					System.out.println(name.substring(index + 2)); //Extract substring from (index + 2) till the end
				}
			}
		}
	}
}
