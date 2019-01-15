class SelectionSort{
  public static void main(String[] args) {
    int[] data = {1,3,2,6,5};
    sort(data);
    print(data);
  }
  
  static void sort(int[] data){
    int n = data.length;
      for(int i = 0; i < n -1; i ++){
      int min = i;
      for (int j = i + 1; j < n; j++) {
        if (data[j] < data[min]) {
          min = j;
        }
      }
      swap(data, i, min);
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