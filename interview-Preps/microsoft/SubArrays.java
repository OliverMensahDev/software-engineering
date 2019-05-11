class SubArrays {
	public static void main(String args[]) {
		int [] a = {-1, 2, -5}; 
        System.out.println("Maximum contiguous sum is " +  maxSubArraySum(a));
	}
    static int maxSubArraySum(int a[]) 
    { 
        int size = a.length; 
        int max_so_far = Integer.MIN_VALUE, prev_sum = 0; 
  
        for (int i = 0; i < size; i++) 
        { 
            prev_sum = prev_sum + a[i]; 
            if (max_so_far < prev_sum) 
                max_so_far = prev_sum; 
            if (prev_sum < 0) 
                prev_sum = 0; 
        } 
        return max_so_far; 
    } 
}
