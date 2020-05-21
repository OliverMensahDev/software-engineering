class BST {
    constructor(value){
        this.value = value;
        this.right = null;
        this.left = null;
    }
    insert(value) {
        if (value <= this.value) {
            if (!this.left) this.left = new BST(value);
            else this.left.insert(value);
        }
        else if (value > this.value) {
            if (!this.right) this.right = new BST(value);
            else this.right.insert(value);
        }
    }
    contains(value) {
        if (this.value === value) return true;
        if (value < this.value) {
            if (!this.left) return false;
            else return this.left.contains(value);
        }
        else if (value > this.value) {
            if (!this.right) return false;
            else return this.right.contains(value);
        }
    }
  
    depthFirstTraversal(iteratorFunc, order) {
        if (order === 'pre-order') iteratorFunc(this.value);
        if (this.left) this.left.depthFirstTraversal(iteratorFunc, order);
        if (order === 'in-order') iteratorFunc(this.value);
        if (this.right) this.right.depthFirstTraversal(iteratorFunc, order);
        if (order === 'post-order') iteratorFunc(this.value);
    };
  
    breadthFirstTraversal(iteratorFunc) {
        var queue = [this];
        while (queue.length) {
            var treeNode = queue.shift();
            iteratorFunc(treeNode);
            if (treeNode.left) queue.push(treeNode.left);
            if (treeNode.right) queue.push(treeNode.right);
        }
    };
  
    findSmallest() {
        let current = this;
        while (current) {
            if (!current.left) return current.value;
            current = current.left;
        }
        return current.value
    }

  
    findLargest() {
        let current = this;
        while (current) {
            if (!current.right) return current.value;
            current = current.right;
        }
        return current.value
    }
    findSecondLargest() {
        if (!this || (!this.left && !this.right)) {
            throw new Error('Tree must have at least 2 nodes');
        } 
        let current = this;
        while (current) {
            // Case: current is largest and has a left subtree
            // 2nd largest is the largest in that subtree
            if (current.left && !current.right) {
                return findLargest(current.left);
            } 
            if (current.right    && !current.right.left && !current.right.right) {
                return current.value;
            }
            current = current.right;
        }
        return current
    }
    isBalanced() {
        // A tree with no nodes is superbalanced, since there are no leaves!
        if (!this) {
            return true;
        } 
        const depths = []; // We short-circuit as soon as we find more than 2
        // Nodes will store pairs of a node and the node's depth
        const nodes = [];
        nodes.push([this, 0]);
        while (nodes.length) {
            // Pop a node and its depth from the top of our stack
            const nodePair = nodes.pop();
            const node = nodePair[0];
            const depth = nodePair[1];
            if (!node.left && !node.right) {
                // Сase: we found a leaf
                // We only care if it's a new depth
                if (depths.indexOf(depth) < 0) {
                    depths.push(depth);
                    // Two ways we might now have an unbalanced tree:
                    // 1) More than 2 different leaf depths
                    // 2) 2 leaf depths that are more than 1 apart
                    if ((depths.length > 2) || (depths.length === 2 && Math.abs(depths[0] - depths[1]) > 1) ) {
                        return false;
                    }
                }
            } else {
                // Case: this isn't a leaf - keep stepping down
                if (node.left) {
                    nodes.push([node.left, depth + 1]);
                } 
                if (node.right) {
                    nodes.push([node.right, depth + 1]);
                }
            }
        } 
        return true;
    }

    print(){
        console.log(this.value)
        if(this.left)  console.log("Left => " + this.left.value)
        if(this.right) console.log("Right =>" +this.right.value)
        if(this.left) this.left.print()
        if(this.right) this.right.print()
        return
    }
    
} 
let  bst = new BST(50);
  
  bst.insert(30);
  bst.insert(70);
  bst.insert(100);
  bst.insert(60);
  bst.insert(59);
  bst.insert(20);
  bst.insert(45);
  bst.insert(35);
  bst.insert(85);
  bst.insert(105);
  bst.insert(10);
  
  function log(node) {
   console.log(node.value);
  }
  
  bst.breadthFirstTraversal(log);

  console.log(bst.isBalanced());

bst.print()
  