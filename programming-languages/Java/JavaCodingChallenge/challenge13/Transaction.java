/**
 * Question 1: Solution
 * We have to override following methods:
 * 1. toString() method controls what is printed to the console, if reference is passed in System.out.printl() method.
 * 2. equals(Object) method controls the equality of two instances.
 * 
 * @author Udayan Khattry
 */
package challenge13;

public class Transaction {
	private int id;
	private String desc;

	public Transaction(int id) {
		this.id = id;
	}
	
	public int getId() {
		return id;
	}
	
	public String getDesc() {
		return desc;
	}

	public void setDet(String desc) {
		this.desc = desc;
	}
	
	@Override
	public String toString() {
		return "Transaction [ID = " + id + ", Description = " + desc + "]";
	}
	
	@Override
	public boolean equals(Object obj) {
		if(obj instanceof Transaction) {
			Transaction t = (Transaction) obj;
			//Two transaction instances are considered equal if their ids are same
			//NOTE: desc may match or may not match.
			if(this.id == t.id) {
				return true;
			}
		}
		return false;
	}
}
