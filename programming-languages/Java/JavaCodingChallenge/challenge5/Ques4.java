/**
 * Question 4:
 * short [] scores = {51, 85, 32, 0, 98, 157, 82, 101, 64, 249};
 * Above array stores the scores of a batsman in his last 10 innings in the game of cricket.
 * To know more about cricket, you can visit Wikipedia link: https://en.wikipedia.org/wiki/Cricket
 * If score is greater than or equal to 50 but less than 100, it is regarded as half-century.
 * If score is greater than or equal to 100 but less than 200, it is regarded as a century.
 * If score is greater than or equal to 200, it is regarded as a double-century.
 * NOTE: No scenario of triple-century in this case.
 * 
 * Write the code to print the number of half-centuries, centuries and double-centuries scored by the batsman.
 * 
 * @author Udayan Khattry
 */
package challenge5;

public class Ques4 {
	public static void main(String[] args) {
		short [] scores = {51, 85, 32, 0, 98, 157, 82, 101, 64, 249};
		
		//1st array element stores the count of half-centuries
		//2nd array element stores the count of centuries
		//3rd array element stores the count of double-centuries
		byte [] results = new byte[3];
		
		//for loop to iterate through all the array elements.
		for(int i = 0; i < scores.length; i++) {
			//NOTE: Your logic may be different from mine but output should not differ.
			if(scores[i] >= 200) { //if score is greater than or equals to 200
				results[2]++; //Same as results[2] = results[2] + 1;
			} else if (scores[i] >= 100) { //if score is greater than or equals to 100
				results[1]++;
			} else if (scores[i] >= 50) { //if score is greater than or equals to 50
				results[0]++;
			}
		}
		
		System.out.println("Half-centuries scored by the batsman: " + results[0]);
		System.out.println("Centuries scored by the batsman: " + results[1]);
		System.out.println("Double-centuries scored by the batsman: " + results[2]);
	}
}

/*
OUTPUT:
Half-centuries scored by the batsman: 5
Centuries scored by the batsman: 2
Double-centuries scored by the batsman: 1
*/
