/**
 * Question 2: Solution.
 * 
 * System.out.print(arr[i].name().toUpperCase().charAt(0)); -> NEWS
 * This means there should be 4 enum constants as loop needs to be executed 4 times.
 * First character of constant names should be n, e, w, s (in any case) respectively.
 * 
 * @author Udayan Khattry
 */
package challenge17;

public class Ques02 {
	enum Direction {
		NORTH, EAST, WEST, SOUTH; //1st constant list
		//north, east, west, south; //2nd constant list
		//North, East, West, South; //3rd constant list
		//N, E, W, S; //4th constant list
		//n, e, w, s; //5th constant list
	}
	
	public static void main(String[] args) {
		Direction [] arr = Direction.values();
		for(int i = 0; i < arr.length; i++) {
			System.out.print(arr[i].name().toUpperCase().charAt(0));
		}
	}
}
