import java.util.Random;
class Array{
  public static void main(String[] args){
    int[] data = {1, -2 , 2,3,2, -1};
//    repetition(data);
//    System.out.println(maxSubArray(data));
    int[] res= reservoir(data, 3);
    print(res);
  }
  static void repetition(int[] data){
    for(int i =0; i< data.length; i++){
      int value = Math.abs(data[i]);
      
      if(data[value] > 0){
        data[value] = -data[value];
      }else{
        System.out.println(value+" is repeated");
      }
    }
  }
  
  static int maxSubArray(int[] data){
    int current_sum = data[0];
    int global_sum = data[0];
    for(int i =1; i< data.length ; i++){
      current_sum = Math.max(data[i] , current_sum+data[i]);
      if(current_sum > global_sum )
        global_sum = current_sum;
    }
    return global_sum;
  }
  
  static int[] reservoir(int[] data, int k){
    Random random  = new Random();
    //new array for k items
    int[] res = new int[k];
    //fill it with first k items of original array;
    for( int i =0; i<res.length; i++)
      res[i] = data[i];
    
    for(int i= k+1; i< data.length; i++){
      int j = random.nextInt(i) + 1;
      if(j < k) res[j] = data[i];
    }
    return res;
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