/**
 * Question 2: Solution.
 * 
 * @author Udayan Khattry
 */
package challenge16;

public class Ques02 {
	public static void main(String[] args) {
		String str = "abcdef";
		System.out.println(reverse(str));
	}
	
	private static String reverse(String source) {
		String result = "";
		if(source != null && source.trim().length() > 0) { //if passed String is not null and is not blank
			char [] arr = source.toCharArray(); //Converts the string to char array.
			for(int i = arr.length - 1; i >= 0; i--) { //iterate through array from last to first
				result += arr[i];
			}
			return result;
		}
		return null; //if reached here, it means either source is null OR source is blank
	}
}
