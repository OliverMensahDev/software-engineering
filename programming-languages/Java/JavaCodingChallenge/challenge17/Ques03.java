/**
 * Question 3: Solution.
 * 
 * We are not allowed to modify main(String []) method, so we must change the Alphabets enum.
 * 
 * There are multiple solutions available:
 * 1. Create a String variable type: private String type;
 *    Add a Parameterized constructor: Alphabets(String type) {this.type = type}
 *    Change the getType() implementation to return type: public String getType() {return type;}
 *    Modify constant list: A("Vowel"), B("Consonant"),....;
 *    Not a good solution as group of constants are associated with one value.
 *    
 * 2. return "Consonant" from getType() method: public String getType() {return "Consonant";}
 *    Provide constant specific class body for  A, E, I, O, U and override getType() method to return "Vowel".
 *    Well this solution is better than 1st one but there is another simple solution available.
 *    Check the below implementation of getType() method.
 * 
 * @author Udayan Khattry
 */
package challenge17;

enum Alphabets {
	A, B, C, D, E, F, G, H, I, J, K, L, M, N, O, P, Q, R, S, T, U, V, W, X, Y, Z;
	
	//getType() is an instance method and all instance method has access to keyword this
	//All constants A, B, C, ... are instances of Alphabets enum
	public String getType() {
		switch(this) { //keyword this represents currently executing instance, which means at runtime when this method 
		               //is invoked on particular constant instance, then at that time keyword this 
		               //would refer to that instance. 
		               //For example, when Alphabets.A.getType() is invoked, then keyword this would refer to Alphabets.A.
		               //If Alphabets.Z.getType() is invoked, then keyword this would refer to Alphabets.Z
			//fall-through syntax
			case A:
			case E:
			case I:
			case O:
			case U:
				return "Vowel";
			default:
				return "Consonant";
		}
	}
}

public class Ques03 {
	public static void main(String[] args) {
		for(Alphabets alphabet : Alphabets.values()) {
			System.out.println(alphabet.toString() + " : " + alphabet.getType());
		}
	}
}
