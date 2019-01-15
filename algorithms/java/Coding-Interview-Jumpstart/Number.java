class Number{
  
  public static void main(String[] args){
    int [] A = {1,3,5};
    int [] B = {6};
    System.out.println(Reverse(234));
  }
  
  static boolean isPrime(int n){
    for( int i = 2; i<n ; i++){
      if( n % i == 0) return false;
    }
    return true;
  }
  
  static boolean isEven(int n){
    return n % 2 == 0? true : false;
  }
  
  static boolean isOdd(int n){
    return n % 2 == 1 ? true : false;
  }
  
  static int reverse(int data){
    int sum = 0;
    if(data / 10 == 0){
      sum = data;
    }
    else{
      String strInt =  String.valueOf(data);
      for(int i =strInt.length() -1 ; i >= 0; i--){
        int intStr = Integer.parseInt(String.valueOf(strInt.charAt(i)));
        sum += intStr * Math.pow(10, i); 
      }
    }
    return sum;
  }
  
  static int Reverse(int n){
    int reversed = 0;
    int remainder = 0;
    while(n > 0){
      remainder = n % 10;
      n = n / 10;
      reversed = reversed * 10 + remainder;
    }
    return reversed;
  }
  
  static int[] union(int[] A, int[] B){
    int n = A.length;
    int m = B.length;
    int C[] = new int[m+n];
    int index = 0;
    for(int i =0; i< n; i++){
      C[index++] = A[i];
    }
    for(int i =0; i< m; i++){
      C[index++] = B[i];
    }
    return C;  
  }
  
  static int max(int[] data){
    int max = 0;
    for (int i = 0; i < data.length; i++) { // O(n)
      max = Math.max(max, data[i]);
    }
    return max;
  }
}