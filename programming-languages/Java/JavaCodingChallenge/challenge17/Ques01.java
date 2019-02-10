/**
 * Question 1: Solution.
 * 
 * We are not allowed to modify main method.
 * System.out.println(js); -> invokes the toString() method.
 * If we want to change the output, then only option is to override toString() method.
 * 
 * All java enums implicitly extend from java.lang.Enum class, which overrides toString() method of Object class.
 * The toString() method of java.lang.Enum class returns the constant name.
 * 
 * @author Udayan Khattry
 */
package challenge17;

public class Ques01 {
	enum JobStatus {
		SUCCESS(1), FAILURE(2), WAITING(3);
		
		private int code;
		
		private JobStatus(int code) {
			this.code = code;
		}
		
		@Override
		public String toString() {
			//return name() + "[" + code + "]"; //this also works
			return super.toString() + "[" + code + "]";
		}
	}
	
	public static void main(String[] args) {
		for(JobStatus js : JobStatus.values()) {
			System.out.println(js);
		}
	}
}
