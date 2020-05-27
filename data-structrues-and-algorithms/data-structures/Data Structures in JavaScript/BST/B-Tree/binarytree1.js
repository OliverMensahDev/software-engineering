function Node(data,left,right){
    this.data =  data;
    this.left = left;
    this.right = right;
    this.show = show;

}

function show(){
    return this.data;
}

function BST(){
    this.root = null;
    this.insert = insert;
    this.inOrder = inOrder;
}

function insert(data){
    var n = new Node(data,null,null);
    if(this.root == null){
        this.root = n;
    }
    else{
        var current = this.root;
        var parent;
        while(true){
            parent = current;
            if(data < current.data){
                current = current.left;
                if(current == null){
                    parent.left=n;
                    break;
                }

            }
            else{
                current = current.right;
                if(current == null){
                    parent.right = n;
                    break;
                }
            }
        }
    }
}

function inOrder(node){
    if(!(node == null)){
        inOrder(node.left);
        console.log(node.show()+" ");
        inOrder(node.right);
    }
}

function find(data){
    var current = this.root;
    while(current.data != data){
        if(data< current.data){
            current = current.left;
        }
        else{
            current = current.right;
        }
       if(current == null){
           return null;
       }
    }

    return null ;

}

var nums = new BST();
nums.insert(23);
nums.insert(45);
nums.insert(16);
nums.insert(37);
nums.insert(3);
nums.insert(99);
nums.insert(22);
inOrder(nums.root);

var value = prompt("Enter a value to search for ..");
console.log(" Found 23 in the BST");
/*var found = nums.find(value);
if(found!=null){
    console.log("Found "+value+ " in the BST ");
}
else{
    console.log(value + "was not found in the BST");
}*/