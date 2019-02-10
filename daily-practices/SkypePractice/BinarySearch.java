class BinarySearch {
	public static void main(String args[]) {
		int[] data = {1,2,3,5,6,7};
        System.out.println(search(data, 7));
	}

    public static int search(int[] data, int target){
        int start = 0;
        int end = data.length - 1;
        while(start <= end){
            int mid = (start + end ) / 2;
            if(target < data[mid]) end = mid -1;
            else if(target > data[mid]) start = mid +1;
            else return mid;
        }
        return -1;
    }
}
