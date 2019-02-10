/**
 * Question 1: 
 * Television extends from Electronics and implements operate() method.
 * 
 * @author Udayan Khattry
 */
package challenge14;

public class Television extends Electronics {
	private String channel;

	public Television(String channel) {
		super();
		this.channel = channel;
	}

	public void setChannel(String channel) {
		this.channel = channel;
	}

	public String getChannel() {
		return this.channel;
	}

	@Override
	public void operate() {
		if (isOn() && this.channel != null) {
			System.out.println("Playing: " + channel);
		} else if (!isOn()) {
			System.out.println("Switch on the TV");
		} else if (channel == null) {
			System.out.println("Select channel to play");
		}
	}
}
