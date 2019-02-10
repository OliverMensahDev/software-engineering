/**
 * Question 3: Solution.
 * 
 * @author Udayan Khattry
 */
package challenge16;

public class Ques03 {
	public static void main(String[] args) {
		String str1 = "Core";
		String str2 = " Java";
		
		String s1 = str1 + str2; //1. + operator
		System.out.println(s1);
		
		String s2 = str1.concat(str2); //2. concat(String) method of String class
		System.out.println(s2);
		
		String s3 = new StringBuilder(str1).append(str2).toString(); //3. method chaining, append(String) method of StringBuilder
		System.out.println(s3);
	}
}
