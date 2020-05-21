class BST{
    constructor(value){
        this.value = value;
        this.right = null;
        this.left = null
    }

    insert(value){
        if(value < this.value){
            if(!this.left) this.left = new BST(value)
            else this.left.insert(value)
        }else if(value > this.value){
            if(!this.right) this.right = new BST(value)
            else this.right.insert(value)
        }
    }

    contains(value){
        if(this.value == value) return true
        if (value < this.value) {
            if (!this.left) return false;
            else return this.left.contains(value);
        }
        else if (value > this.value) {
            if (!this.right) return false;
            else return this.right.contains(value);
        }
    }


    getMaxValue(){
        if(this.right) return this.right.getMaxValue()
        else return this.value;
    }


    getMinValue(){
        if(this.left) return this.left.getMinValue()
        else return this.value;
    }

    findSecondLargest() {
        if (this.left && !this.right) {
            return this.left.getMaxValue();
        }
        if (this.right && !this.right.left && !this.right.right) {
            return this.value;
        } 
        return this.right.findSecondLargest();
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


let bst = new BST(50)
bst.insert(40)
bst.insert(53);
bst.insert(10)
bst.insert(60)
bst.insert(52)
bst.insert(62)
bst.insert(100)
bst.insert(90)
console.log(bst.print());
