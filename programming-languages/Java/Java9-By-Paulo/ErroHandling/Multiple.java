public  class Multiple {
	public static void main(String args[]){
		int numbers[] = { 4, 8, 16, 32, 64, 128, 256, 512};
		int denom[] = { 2, 0, 4, 4, 0, 8};
		
		for( int i = 0; i < numbers.length; i++){
			try{
				System.out.println(numbers[i] + " / " + denom[i] + " is " + numbers[i]/denom[i]);

			}catch(ArithmeticException e){
				System.out.println("Cannot Divide");
			}catch(ArrayIndexOutOfBoundsException e){
				System.out.println("Has no Match");
			}
			
		}
	}
}

