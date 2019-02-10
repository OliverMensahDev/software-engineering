/**
 * Question 2: 
 * We have to override equals(Object) method in Person class such that on 
 * executing this class following output is shown:
 * true
 * true
 * false
 * 
 * @author Udayan Khattry
 */
package challenge13;

public class TestPerson {
	public static void main(String[] args) {
		Person p1 = new Person("Udayan", "Khattry"); //Camel case
		Person p2 = new Person("UDAYAN", "KHATTRY"); //UPPER case
		Person p3 = new Person("udayan", "khattry"); //lower case
		Person p4 = new Person("Udayn", "KHATRY"); //Spelling is different
		
		System.out.println(p1.equals(p2)); //true
		System.out.println(p1.equals(p3)); //true
		System.out.println(p1.equals(p4)); //false
		
		/*
		 * Looking at above output, we can easily say that two Person objects are equal
		 * if their firstName and lastName are same. And also while comparing firstName and 
		 * lastName properties, case is ignored.
		 */
	}
}
