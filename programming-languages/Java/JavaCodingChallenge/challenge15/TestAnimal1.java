/**
 * Question 1: Solution.
 * 
 * @author Udayan Khattry
 */
package challenge15;

public class TestAnimal1 {
	public static void main(String[] args) {
		Animal [] animals = null; //animals reference variable is null
		test(animals);
		animals = new Animal[2]; //elements of animals array are null
		test(animals);
	}
	
	private static void test(Animal [] animals) {
		if(animals != null) { //animals reference variable should not be null
			for(Animal obj : animals) {
				if(obj != null) { //elements of animals array should not be null
					obj.eat();
					obj.sleep();
				}
			}
		}
	}
}


