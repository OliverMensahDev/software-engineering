/**
 * Question 4: Solution.
 * If handling for different unrelated exceptions is same, then we can use multi-catch block.
 * 
 * Don't just handle super type (RuntimeException or Exception or Throwable), you will get
 * same output in these cases, but this solution does not adhere to below statement:
 * "But if method m1(int) throws newer exceptions in future, 
 * then main(String[]) method may decide to handle those new exceptions differently."
 * 
 * @author Udayan Khattry
 */
package challenge15;

public class Question04 {
	
	public static void main(String[] args) {
		int [] arr = {1, 2, 3};
		for(int a : arr) {
			try {
				m1(a);
			} catch(NullPointerException | ArithmeticException | ArrayIndexOutOfBoundsException e1) {
				System.out.println(e1);
			}
		}
	}
	
	private static void m1(int i) {
		switch(i) {
			case 1:
				System.out.println(5/0);
			case 2:
				String s = null;
				System.out.println(s.length());
			case 3:
				String [] arr = new String[1];
				System.out.println(arr[1]);
		}
	}
}
