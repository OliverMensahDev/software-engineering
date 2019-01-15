class InsertionSort{
  public static void main(String[] args) {
    int[] data = {1,3,2,6,5};
    sort(data);
    print(data);
  }
  
  static void sort(int[] data){
    for( int i = 1; i < data.length; i++){
      for(int j = i; j> 0 && data[j] < data[j -1]; j--){
        swap(data, j , j -1);
      }
    }
  }
  static void swap(int[] data, int currentIndex, int nextIndex){
    int temp = data[currentIndex];
    data[currentIndex] = data[nextIndex];
    data[nextIndex] = temp;
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