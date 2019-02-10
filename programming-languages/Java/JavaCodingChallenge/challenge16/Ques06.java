/**
 * Question 6: Solution.
 * 
 * @author Udayan Khattry
 */
package challenge16;

public class Ques06 {
	public static void main(String[] args) {
		String str1 = "&^%^1&8O^^..ne. .52||{{T.*@,(wo#$ %^*f!@%^<<i86876ve&%^$ ^%$S$..,,!i!%*&#x&*@!$";
		System.out.println(decodeTheCode(str1));
		
		String str2 = "N000000i%$!,n9!!!!<e>>>>> 43.***T#$#%hr##<e><e>><{{ ###f##00o00###u%$#$##$#r";
		System.out.println(decodeTheCode(str2));
	}
	
	private static String decodeTheCode(String str) {
		StringBuilder sb = new StringBuilder();
		if(str != null && str.trim().length() > 0) { //if passed String is not null and is not blank
			char [] ch = str.trim().toCharArray(); //Convert to char array
			for(char c : ch) {
				if(Character.isAlphabetic(c) || c == ' ') { //Filter out all the characters except alphabets and space
					sb.append(c);
				}
			}
			
			//If reached here, then for input 1, sb contains "One Two five Six" [Output should be: 6521]
			//And for input 2, sb contains "Nine Three four" [Output should be: 439]
			//Convert above words to digits: One -> 1, five -> 5 etc.
			
			String [] arr = sb.toString().split(" "); //Splits the String on space and returns an array object
			sb.delete(0, sb.length()); //Clear all the contents of sb object.
			for(String temp : arr){
				sb.append(getDigit(temp));
			}
			//After for loop, for input 1, sb contains "1256" [Output should be: 6521]
			//And for input 2, sb contains "934" [Output should be: 439]
			//Before returning, reverse the contents of sb to get expected output
		}
		return sb.reverse().toString();
	}
	
	/**
	 * If passed string is "Zero" it returns "0"
	 * If passed string is "One" it returns "1"
	 * And so on... It returns values from "0" to "9"
	 * If not a valid string is passed then it returns ""
	 * 
	 * @param str String
	 * @return String value "0", "1"..."9"
	 */
	private static String getDigit(String str) {
		if(str != null) {
			//JDK 5.0 onwards, switch accepts String
			switch(str.toUpperCase()) {
				case "ZERO":
					return "0";
				case "ONE":
					return "1";
				case "TWO":
					return "2";
				case "THREE":
					return "3";
				case "FOUR":
					return "4";
				case "FIVE":
					return "5";
				case "SIX":
					return "6";
				case "SEVEN":
					return "7";
				case "EIGHT":
					return "8";
				case "NINE":
					return "9";
				default: 
					return "";
			}
		}
		return "";
	}
}
