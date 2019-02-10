/**
 * Question 1: 
 * We have to make changes in Transaction class such that on 
 * executing this class following output is shown:
 * Transaction [ID = 1001, Description = Testing 1]
 * Transaction [ID = 1001, Description = Testing 2]
 * Transaction [ID = 1002, Description = Testing 1]
 * true
 * false
 * 
 * @author Udayan Khattry
 */
package challenge13;

public class TestTransaction {
	public static void main(String[] args) {
		Transaction t1 = new Transaction(1001);
		t1.setDet("Testing 1");
		
		Transaction t2 = new Transaction(1001);
		t2.setDet("Testing 2");
		
		Transaction t3 = new Transaction(1002);
		t3.setDet("Testing 1");
		
		System.out.println(t1); //Transaction [ID = 1001, Description = Testing 1]
		System.out.println(t2); //Transaction [ID = 1001, Description = Testing 2]
		System.out.println(t3); //Transaction [ID = 1002, Description = Testing 1]
		/* Solution 1: To get output in above format, override toString() method in Transaction class.*/
		
		System.out.println(t1.equals(t2)); //true
		System.out.println(t1.equals(t3)); //false
		/* Solution 2: 
		 * t1.equals(t2); -> returns true.
		 * Property id of t1 and t2 are same but property desc is different.
		 * 
		 * t1.equals(t3); -> returns false.
		 * Property id of t1 and t3 are different but property desc is same.
		 * 
		 * This means two Transaction instances are considered equal if and only if their ids are same.
		 * Property desc may match or may not match.
		 * 
		 * Implement above logic in equals(Object) method in Transaction class.
		 */
	}
}
