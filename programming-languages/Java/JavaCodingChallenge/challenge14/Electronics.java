/**
 * Question 1: 
 * Electronics class is an abstract class and it has abstract method operate().
 * 
 * @author Udayan Khattry
 */
package challenge14;

public abstract class Electronics {
	private boolean power = false;

	public final void powerOn() {
		power = true;
	}

	public final void powerOff() {
		power = false;
	}

	public final boolean isOn() {
		return power;
	}

	public abstract void operate();
}
