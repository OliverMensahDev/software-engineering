/**
 * Question 7: Solution.
 * 
 * @author Udayan Khattry
 */
package challenge16;

public class Ques07 {
	public static void main(String[] args) {
		String [] arr1 = {"A", "B", "C", "D"};
		String [] arr2 = {"One", null, "Two"};
		String [] arr3 = {"Hello"};
		String [] arr4 = {};
		String [] arr5 = null;
		
		System.out.println(arrayToString(arr1));
		System.out.println(arrayToString(arr2));
		System.out.println(arrayToString(arr3));
		System.out.println(arrayToString(arr4));
		System.out.println(arrayToString(arr5));
	}
	
	private static String arrayToString(String [] arr) {
		if(arr == null) { //if arr is null, then return null
			return null;
		}
		if(arr.length == 0) { //if arr contains no elements then return "[]"
			return "[]";
		}
		//if reached here, it means arr contains at least one element.
		//We have to put the elements inside square bracket.
		StringBuilder sb = new StringBuilder("["); //Start with opening square bracket "["
		for(int i = 0; i < arr.length; i++) {
			//if you are processing last element of the array, then append that element and after that append the closing square bracket "]"
			if(i == arr.length - 1) {
				sb.append(arr[i]).append("]");
				break; //As this is the last element, so break out of the loop.
			}
			//For non-last elements, append the element and after that append comma and single space ", ".
			sb.append(arr[i]).append(", ");
		}
		return sb.toString();
	}
}
