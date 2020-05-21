class EggProblem{
  public static final int NUM_OF_EGGS =2;
  public static final int NUM_OF_FLOORS = 100;
  public static void main(String[] args){
   System.out.println( solve());
    
  }
  
  static int solve(){
    int[][] dpTable = new int[NUM_OF_EGGS + 1][NUM_OF_FLOORS + 1];
    dpTable[0][0] = 1;
    dpTable[1][0] = 1;
    
    for(int i= 0; i<= NUM_OF_FLOORS; i++){
      dpTable[1][i] = i;
    }
    for(int n = 2; n<= NUM_OF_EGGS; n++){
      for(int m = 1; m <= NUM_OF_FLOORS; m++){
        dpTable[n][m] = Integer.MAX_VALUE;
        
        for(int x = 1;  x<=m ; x++){
          int maxDrops = 1 + Math.max(dpTable[n-1][x-1], dpTable[n][m-x]);
          if(maxDrops < dpTable[n][m])
            dpTable[n][m] = maxDrops;
        }
      }
    }
    return dpTable[NUM_OF_EGGS][NUM_OF_FLOORS];
  }
  
   public static void printInOrder(int[][] data){
   
    for( int i = 0; i < data.length; i++){
       System.out.print("[");
      for(int j =0;  j < data[i].length; j++){
        System.out.print(data[i][j]);
        if(i <= data.length && j< data[i].length)
          System.out.print(",");
      }
      System.out.println("]");
    }
    
  }
  
  
}