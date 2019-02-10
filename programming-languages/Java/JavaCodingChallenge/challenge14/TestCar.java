/**
 * Question 4:
 * TestCar class.
 * 
 * @author Udayan Khattry
 */
package challenge14;

public class TestCar {
	public static void main(String[] args) {
		Car car = new Car(new Engine());
		car.startCar();
		car.stopCar();
	}
}
