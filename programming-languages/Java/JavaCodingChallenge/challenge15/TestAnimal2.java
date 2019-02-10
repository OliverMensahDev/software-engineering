/**
 * Question 2: Solution.
 * This exercise checks the knowledge of Reference arrays and Polymorphism and not related to Exceptions.
 * 
 * @author Udayan Khattry
 */
package challenge15;

public class TestAnimal2 {
	public static void main(String[] args) {
		Animal [] animals = new Animal[2];
		animals[0] = new Dog();
		animals[1] = new Cat();
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


