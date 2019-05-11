class AddAllDigits {
	public static void main(String args[]) {
        System.out.print(add(120));
	}

    static int add(int data){
        String digits  = String.valueOf(data);
        int length = digits.length(); 
        if (length == 1) return Integer.parseInt( "" + digits.charAt(0));
        else{
            int sum = 0;
            for(int i =0 ; i < digits.length() ; i++){
                sum += Integer.parseInt( "" + digits.charAt(i));
            }
            return add(sum);
        }
    }
}
