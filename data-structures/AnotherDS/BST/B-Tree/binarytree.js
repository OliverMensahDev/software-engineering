function Node(data, left, right) {
    this.data = data;
    this.left = left;
    this.right = right;
    this.show = show;
    }
    
    function show() {
    return this.data;
    }
    
    function BST() {
    this.root = null;
    this.insert = insert;
    this.inOrder = inOrder;
    
    }
    
    function insert(data) {
    var n = new Node(data, null, null);
    if (this.root == null) {
    this.root = n;
    }
    else {
    var current = this.root;
    var parent;
    while (true) {
    parent = current;
    if (data < current.data) {
    current = current.left;
    if (current == null) {
    parent.left = n;
    break;
    }
    }
    else {
    current = current.right;
    if (current == null) {
    parent.right = n;
    break;
    }
    }
    }
    }
    }
    
    function inOrder(node) {
    if (!(node == null)) {
    inOrder(node.left);
    console.log(node.show() + " ");
    inOrder(node.right);
    }
    }
    
    var nums = new BST();
    nums.insert(7);
    nums.insert(15);
    nums.insert(5);
    nums.insert(3);
    nums.insert(9);
    nums.insert(8);
    nums.insert(10);
    nums.insert(13);
    nums.insert(12);
    nums.insert(14);
    nums.insert(20);
    nums.insert(18);
    nums.insert(25);
    console.log("Inorder traversal: ");
    console.log(nums.root);
    inOrder(nums.root);