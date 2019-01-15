class Matrix {
  public static void main(String[] args){
    int mat[][] = { 
      { 1, 2, 3, 4 }, 
      { 5, 6, 7, 8 }, 
      { 9, 10, 11, 12 }
    }; 
    //printInOrder(mat);
//    printMatrixInSpiralWay(mat);
    System.out.println(find(mat, 32));
  }
  
  public static void printInOrder(int[][] data){
    System.out.print("[");
    for( int i = 0; i < data.length; i++){
      for(int j =0;  j < data[i].length; j++){
        System.out.print(data[i][j]);
        if(i <= data.length && j< data[i].length)
          System.out.print(",");
      }
    }
    System.out.print("]");
  }
  
  private static void printMatrixInSpiralWay(int[][] matrix){
    int rowStart = 0, colStart = 0, rowEnd = matrix.length -1, colEnd = matrix[0].length - 1;
    while(rowStart <= rowEnd && colStart <= colEnd){
      // left to right 
      for(int i = rowStart; i <= colEnd; i++){
        System.out.print(matrix[rowStart][i] + " ");
      }
      
      // top to down 
      for(int i = rowStart +1; i<= rowEnd; i++){
        System.out.print(matrix[i][colEnd] + " ");
      }
      
      // right to left ;
      if(rowStart + 1 <= rowEnd){
        for(int i= colEnd - 1; i>=colStart;  i--){
          System.out.print(matrix[rowEnd][i] + " ");
        }
      }
      // bottom to up
      if(colStart +1 <= colEnd){
        for(int i = rowEnd -1; i > rowStart; i--){
          System.out.print(matrix[i][colStart] + " ");
        }
      }
      rowStart++;
      rowEnd--;
      colStart++;
      colEnd--;
    }   
  }
  static boolean find(int matrix[][], int value) { 
    int rows = matrix.length; 
    int cols = matrix[0].length; 
    int start = 0; 
    int end = rows * cols - 1; 
    while (start <= end) { 
      int mid = start + (end - start) / 2; 
      int row = mid / cols; 
      int col = mid % cols; 
      int v = matrix[row][col]; 
      if (v == value) 
        return true; 
      if (v > value) 
        end = mid - 1; 
      else 
        start = mid + 1; 
    } 
    return false; 
    
  }
}
