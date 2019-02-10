/**
 * Question 3 - Solution:
 * 
 * @author Udayan Khattry
 */
package challenge11;

import java.util.Scanner;

class Message {
	public static String msg;
	
	//static initialization block is executed only once at the time of class loading.
	//So below block will be invoked when Message.msg is accessed in System.out.println statement.
	//static variable msg will be assigned with the value entered by the user.
	//Below block will not be invoked again on Message object creation using "new Message();"
	static {
		Scanner scanner = new Scanner(System.in);
		System.out.print("Type today's message and press <ENTER>: ");
		msg = scanner.nextLine();
		scanner.close();
	}
}

public class MessageOfTheDay {
	public static void main(String[] args) {
		System.out.println("Message of the Day is: " + Message.msg);
		new Message();
		new Message();
	}
}
