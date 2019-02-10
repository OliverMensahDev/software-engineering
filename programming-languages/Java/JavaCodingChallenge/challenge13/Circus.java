/**
 * Question 4: Solution
 * 
 * @author Udayan Khattry
 */
package challenge13;

public class Circus {
	public static void doTrick(Animal animal) {
		//Below statement calls walk() method on animal reference.
		//doTrick(Animal) method can accept instance of Animal class or its subclass.
		//If animal refers to an instance of Animal class, then walk() method of Animal class is invoked at runtime.
		//If animal refers to an instance of Dog class, then walk() method of Dog class is invoked at runtime.
		//If animal refers to an instance of Cat class, then walk() method of Cat class is invoked at runtime.
		animal.walk();
		
		//TODO: add code to call wagTail() method of Dog class.
		//wagTail() method is available in Dog class, so to invoke this method 
		//we need to cast animal reference to Dog. instanceof check is necessary before casting.
		if(animal instanceof Dog) {
			Dog d = (Dog) animal;
			d.wagTail();
		}
		
		//TODO: add code to call jump() method of Cat class.
		//jump() method is available in Cat class, so to invoke this method 
		//we need to cast animal reference to Cat. instanceof check is necessary before casting.
		if(animal instanceof Cat) {
			Cat c = (Cat) animal;
			c.jump();
		}
	}
	
	public static void main(String [] args) {
		Animal a1 = new Animal();
		Circus.doTrick(a1);
		
		Animal a2 = new Dog();
		Circus.doTrick(a2);
		
		Animal a3 = new Cat();
		Circus.doTrick(a3);
	}
}
