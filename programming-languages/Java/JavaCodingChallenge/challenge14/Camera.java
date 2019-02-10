/**
 * Question 1: 
 * Camera extends from Electronics and implements operate() method.
 * 
 * @author Udayan Khattry
 */
package challenge14;

public class Camera extends Electronics {
	public String memoryCard = "8 GB";
	
	public void addMemoryCard(String memoryCard) {
		this.memoryCard = memoryCard;
	}
	
	public boolean hasMemoryCard() {
		if (memoryCard != null && !memoryCard.trim().equals("")) {
			return true;
		}
		return false;
	}
	
	@Override
	public void operate() {
		if(isOn() && hasMemoryCard()) {
			System.out.println("Click Picture");
		} else if(!isOn()) {
			System.out.println("Press the Power button");
		} else if(!hasMemoryCard()) {
			System.out.println("Add a memory Card first");
		}
	}
}
