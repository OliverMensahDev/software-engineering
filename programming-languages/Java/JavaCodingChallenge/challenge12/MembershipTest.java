/**
 * Question 4: Test Class.
 * 
 * @author Udayan Khattry
 */
package challenge12;

public class MembershipTest {
	public static void main(String[] args) {
		GymMembershipPromotion obj1 = new GymMembershipPromotion("neha", 6, 3000);
		System.out.println(obj1);
		System.out.println(obj1.getTotalCost());
		
		GymMembershipPromotion obj2 = new GymMembershipPromotion("iru", 6, 3000);
		System.out.println(obj2);
		System.out.println(obj2.getTotalCost());
	}
}
