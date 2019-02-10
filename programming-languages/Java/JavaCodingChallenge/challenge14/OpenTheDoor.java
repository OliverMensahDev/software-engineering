/**
 * Question 1 - Solution:
 * 
 * @author Udayan Khattry
 */
package challenge14;

import java.util.Scanner;

public class OpenTheDoor {
	public static void main(String[] args) {
		/* 
		 1. Create an instance of Electronics [] type to store 3 instances 
		    of subclass of Electronics type. 
		 */
		Electronics [] doors = new Electronics[3];
		
		/*
		 2. 1st array element should refer to a Camera instance, 
		    2nd array element should refer to a Television instance 
		    and 3rd array element should refer to a SmartPhone instance.
		 */
		doors[0] = new Camera();
		doors[1] = new Television("Star Sports");
		doors[2] = new SmartPhone();
		
		/*
		 3.	We have to emulate Open the door game in which objects are 
		    hidden behind the doors and a participant is asked to select 
		    the door number to win the prize.
            Write a code, asking user to provide door number 1 / 2 / 3.
		 */
		Scanner scanner = new Scanner(System.in);
		System.out.print("Please select one door (1/2/3): ");
		int doorNum = scanner.nextInt() - 1; //First door number is 1 but array index starts with 0
		if(doorNum < 0 || doorNum > 2) { //Check if user has provided correct door number or not
			System.out.println("You have not provided correct door number. Exiting....");
			System.exit(-1);
		}
		scanner.close();
		
		/*
		 4.	On selecting the door, power on the device, operate and then power it off.
		 */
		Electronics elec = doors[doorNum];
		elec.powerOn();
		System.out.println("Switched On? " + elec.isOn());
		elec.operate();
		elec.powerOff();
		System.out.println("Switched On? " + elec.isOn());
	}
}
