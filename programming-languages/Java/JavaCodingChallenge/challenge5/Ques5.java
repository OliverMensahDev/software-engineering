/**
 * Question 5:
 * In mathematics, the Fibonacci series are the numbers in the following integer sequence:
 * 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, ...
 * By definition, the first two numbers in the Fibonacci sequence are 0 and 1, 
 * and each subsequent number is the sum of the previous two.
 * 
 * Write a Java Program to generate above series till n number of times (For example you can try with 
 * n = 10 and n = 15) and store it in One-dimensional array.
 * For n = 10, Fibonacci series: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34
 * For n = 15, Fibonacci series: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377
 * 
 * Write a for loop to print all the elements of the array.
 * 
 * @author Udayan Khattry
 */
package challenge5;

public class Ques5 {
	public static void main(String a[]) {
		int count = 15; //If you want Fibonacci Series till 10 numbers then assign 10 to count. Change it to 15 to have Fibonacci Series till 15 numbers.
		int[] fib = new int[count]; //Array to store the series
		fib[0] = 0; //First member of the series is always 0
		fib[1] = 1; //Second member of the series is always 1

		// Store the values in fib array
		for (int i = 2; i < count; i++) { // Array index starting with 2 as values are already assigned to elements at 0th and 1st indexes.
			fib[i] = fib[i - 1] + fib[i - 2]; //next number is always the sum of previous two numbers
		}

		// Print the values from fib array
		for (int i = 0; i < fib.length; i++) {
			System.out.print(fib[i] + " ");
		}
	}
}

/*
OUTPUT:
count = 10; -> 0 1 1 2 3 5 8 13 21 34 
count = 15; -> 0 1 1 2 3 5 8 13 21 34 55 89 144 233 377 
*/