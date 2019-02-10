class BinarySearchRotatedArray{
    public static void main(String[] args){
        int[] data = {1, 2, 3,5, 0,-1};
        int key = -1, n = data.length;
        int pivot = findPivotIndex(data, 0, n -1); 
        // If we didn't find a pivot, then 
        // array is not rotated at all 
        if (pivot == -1) 
            System.out.println(search(data, 0, n-1, key)); 
            
        // If we found a pivot, then first 
        // compare with pivot and then 
        // search in two subarrays around pivot 
        if (data[pivot] == key) 
             System.out.println( pivot); 
        if (data[0] <= key) 
           System.out.println(search(data, 0, pivot-1, key)); 
        System.out.println(search(data, pivot+1, n-1, key)); 
    }

    public static int findPivotIndex(int[] data, int start, int end){
        if(start > end) return - 1;
        if(start == end) return start;
        int mid = (start + end) / 2;
        if(mid < end && data[mid] > data[mid+1]) return mid;
        if(mid > start && data[mid] < data[mid - 1])return mid - 1;
       if (data[start] >= data[mid]) 
            return findPivotIndex(data, start, mid-1); 
        return findPivotIndex(data, mid + 1, end); 
    }



    public static int search(int[] data, int start, int end, int key){
        if(start > end) return -1;
        int mid = (start + end) / 2;
        if(data[mid] == key) return mid;
        if(data[mid]< key) search(data, mid + 1, end, key );
        return search(data, start, mid - 1, key);
    }
}