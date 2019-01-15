class BST{
  private int value;
  private BST right;
  private BST left;
  public BST(int value){
    this.value = value;
    this.right = null;
    this.left = null;
  }
  
  void insert(int value){
    if (value <= this.value) {
      if (this.left == null) this.left = new BST(value);
      else this.left.insert(value);
    }
    else if (value > this.value) {
      if (this.right == null) this.right = new BST(value);
      else this.right.insert(value);
    }
  }
  
  boolean contains(int value) {
    if (this.value == value) 
      return true;
    else if (value < this.value) {
      if (this.left == null)return false;
      else return this.left.contains(value);
    }else{
      if(this.right == null)return false;
      else return this.right.contains(value);
    }
  }
  
  void  depthFirstTraversal(String order, CallBack callback) {
    if (order == "pre-order") callback.print(this.value);
    if (this.left != null ) this.left.depthFirstTraversal(order, callback);
    if (order == "in-order")  callback.print(this.value);
    if (this.right != null) this.right.depthFirstTraversal(order, callback);
    if (order == "post-order")  callback.print(this.value);
  };
  
  interface CallBack{
    void print(int data);
  }
  
  
  public static void main(String[] args) {
    BST bst = new BST(3);
    bst.insert(4);
    bst.insert(5);
    System.out.println(bst.contains(4));
    bst.depthFirstTraversal("in-order", new CallBack(){
      @Override
      public void print(int data){
        System.out.print(data);
      }
    });
  }
  
  
}