import java.util.HashMap;
class TwoElementSum {
	public static void main(String args[]) {
        int [] res = twoSum(new int[]{1, 3, 5}, 8);
		print(res);
	}
    public  static int[] twoSum(int[] nums, int target) {
        HashMap<Integer, Integer> map = new HashMap<>();
        for (int i = 0; i < nums.length; i++) {
            int complement = target - nums[i];
            if (map.containsKey(complement)) {
                return new int[] { map.get(complement), i };
            }
            map.put(nums[i], i);
        }
        throw new IllegalArgumentException("No two sum solution");
    }
    static void  print(int[] data){
        System.out.print("[");
        for(int i =0; i < data.length; i++){
            System.out.print(data[i]);
            if(i < data.length - 1)
                System.out.print(",");
        }
        System.out.print("]");
    }
}
