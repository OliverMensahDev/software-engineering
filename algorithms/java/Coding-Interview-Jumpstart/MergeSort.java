import java.util.Arrays;
class MergeSort{
  public static void main(String[] args){
    int[] nums = {4,2,6,5,44,78,-4,0,1}; 
    mergeSortA(nums);
    print(nums);
  }
  static void mergeSort(int[] data){
    if(data.length <= 1) return;
    int mid = data.length / 2;
    int[] left = Arrays.copyOfRange(data, 0, mid);
    int[] right = Arrays.copyOfRange(data, mid, data.length);
    
    mergeSort(left);
    mergeSort(right);
    merge(left, right, data);
  }
  
  static void merge(int[] left, int[] right, int[] original){
    int leftIndex= 0,rightIndex = 0,originalIndex = 0;
    while(leftIndex < left.length && rightIndex < right.length){
      if(left[leftIndex] < right[rightIndex])
        original[originalIndex++] = left[leftIndex++];
      else
        original[originalIndex++] = right[rightIndex++];
    }
    while(leftIndex < left.length)
      original[originalIndex++] = left[leftIndex++];
    while(rightIndex < right.length)
      original[originalIndex++]= right[rightIndex++];
  }
  
  static void mergeSortA(int[] data){
    if(data.length <= 1) return;
    int mid = data.length / 2;
    int [] left = new int[mid];
    int [] right = new int[data.length-mid];
    int l =0, r =0;
    for(int i=0; i<mid ; i++){
      left[l++] = data[i];
    }
    for(int i=mid; i<data.length ; i++){
      right[r++] = data[i];
    }
    mergeSort(left);
    mergeSort(right);
    mergeA(left, right, data);

  }
   static void mergeA(int[] left, int[] right, int[] original){
    int leftIndex= 0,rightIndex = 0,originalIndex = 0;
    while(leftIndex < left.length && rightIndex < right.length){
      if(left[leftIndex] < right[rightIndex])
        original[originalIndex++] = left[leftIndex++];
      else
        original[originalIndex++] = right[rightIndex++];
    }
    while(leftIndex < left.length)
      original[originalIndex++] = left[leftIndex++];
    while(rightIndex < right.length)
      original[originalIndex++]= right[rightIndex++];
  }
  private static void print(int[] A) {
    System.out.print("[");
    for (int i = 0; i < A.length; i++) {
      System.out.print(A[i]);
      if (i < A.length - 1) {
        System.out.print(", ");
      }
    }
    System.out.println("]");
  }
  
  
}


 
  