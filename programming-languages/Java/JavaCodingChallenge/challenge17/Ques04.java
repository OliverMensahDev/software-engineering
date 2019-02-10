/**
 * Question 4: Solution.
 * 
 * Let's solve step by step.
 * 1. Name of the enum is: Sports
 * 
 * 2. Constants' names must be: Golf, Tennis, Cricket, Boxing
 * 
 * 3. We need to find out the constant list order such that on executing Ques04 class,
 *    we get following output:
 *    2
 *    1
 *    -1
 *    
 * 4. Sports.Golf.compareTo(Sports.Tennis) = Sports.Golf.ordinal() - Sports.Tennis.ordinal() = 2
 *    This means ordinal value of Tennis is less than ordinal value of Golf, so Tennis should be declared before Golf.
 *    Tennis, Golf
 *    But the difference is 2, which means there is one more constant in between:
 *    Tennis, _______, Golf
 *    
 * 5. Sports.Cricket.compareTo(Sports.Golf) = Sports.Cricket.ordinal() - Sports.Golf.ordinal() = 1
 *    This means ordinal value of Golf is less than the ordinal value of Cricket, so Golf should be declared before Cricket.
 *    Tennis, _______, Golf, Cricket
 *    Difference is 1, which means no constants between Golf and Cricket.
 *    
 * 6. Now one place left and one constant (Boxing) left as well, so constant list should be:
 *    Tennis, Boxing, Golf, Cricket
 *    Hence ordinal values should be:
 *    Tennis -> 0, Boxing -> 1, Golf -> 2, Cricket -> 3
 *    Let's verify 3rd System.out.println statement.
 *    Sports.Tennis.compareTo(Sports.Boxing) = Sports.Tennis.ordinal() - Sports.Boxing.ordinal() = 0 - 1 = -1, which is as per expected output.
 * 
 * 7. Declare enum Sports with the constant list "Tennis, Boxing, Golf, Cricket" either outside the class
 *    or within the class body.
 * 
 * @author Udayan Khattry
 */
package challenge17;

enum Sports {
	Tennis, Boxing, Golf, Cricket
}
public class Ques04 {
	/*enum Sports {
		Tennis, Boxing, Golf, Cricket
	}*/
	public static void main(String[] args) {
		System.out.println(Sports.Golf.compareTo(Sports.Tennis)); //2
		System.out.println(Sports.Cricket.compareTo(Sports.Golf)); //1
		System.out.println(Sports.Tennis.compareTo(Sports.Boxing)); //-1
	}
}
