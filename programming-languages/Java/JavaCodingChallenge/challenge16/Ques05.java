/**
 * Question 5: Solution.
 * 
 * @author Udayan Khattry
 */
package challenge16;

public class Ques05 {
	public static void main(String[] args) {
		String s = "(((W&e**_lco73me %t%o co!@$,,<r>e <J>>>$@av```~a777.||}{";
		
		System.out.println(filterString(s));
	}
	
	private static String filterString(String str) {
		StringBuilder builder = new StringBuilder();
		if(str != null && str.trim().length() > 0) { //if passed String is not null and is not blank
			char [] ch = str.trim().toCharArray(); //Convert to char array
			for(char c : ch) {
				if(Character.isAlphabetic(c) || c == ' ') { //We have to filter out all the characters except alphabets and space
					builder.append(c); //Append alphabets and spaces to builder object
				}
			}
		}
		return builder.toString();
	}
}
