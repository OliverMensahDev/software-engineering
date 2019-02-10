/**
 * Question 4: Solution.
 * 
 * @author Udayan Khattry
 */
package challenge16;

public class Ques04 {
	private static String [] arr = {
			"    ",
			"A",
			"abcdefmQtpz",
			"a$bcddd",
			"wxfdskjf55",
			"zt+ts",
			null
	};
	
	public static void main(String[] args) {
		for(String s : arr) {
			boolean result = hasAllAlphabets(s);
			if(result)
				System.out.println("Yes");
			else {
				System.out.println("No");
			}
		}
	}
	
	private static boolean hasAllAlphabets(String str) {
		if (str != null && str.trim().length() > 0) {
			for (int i = 0; i < str.length(); i++) {
				if (!Character.isAlphabetic(str.charAt(i))) { //If particular character is not alphabet, Note ! operator at the starting of the expression
					return false;
				}
			}
			return true; //If reached here, means for loop completed successfully, which means all characters were alphabets
		} else {
			return false; //If str is null or str is blank
		}
	}
}
