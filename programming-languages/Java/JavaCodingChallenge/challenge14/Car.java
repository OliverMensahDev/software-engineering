/**
 * Car class.
 * Car class contains Engine reference. So Car Has-An engine.
 * To start the car you need to start the engine and
 * to stop the car you need to stop the engine.
 * 
 * @author Udayan Khattry
 */
package challenge14;

public class Car {
	//TODO: 1- Engine instance is needed to start and stop the car
	private Engine engine;
	
	public Car(Engine engine) {
		this.engine = engine;
	}
	
	public void startCar(){
		//TODO: 2- To start the car, start the engine.
		engine.start();
		System.out.println("Car has started.");
	}
	
	public void stopCar() {
		//TODO: 3- To stop the car, stop the engine.
		engine.stop();
		System.out.println("Car has stopped.");
	}
}
