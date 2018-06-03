class MyArray {
    constructor(size){
        this.arr = new Array(size);
    }

    add(index, item){
        if(this.arr[index] == undefined){
            this.arr[index] = item;
        }
    }

    search(index){
        if(this.arr[index] != undefined){
            return this.arr[index];
        }
    }

    update(index, newValue){
        if(this.arr[index] != undefined){
            this.arr[index] = newValue;
        }
    }

    delete(index){
        if(this.arr[index] != undefined){
            this.arr[index] = undefined;
        }
    }

    traverse(){
        for(let i of this.arr){
            console.log(i)
        }
    }
}

var arr = new MyArray(5);
arr.add(0, 3);
arr.add(1, 5);
arr.delete(0);
arr.update(1,6);
arr.traverse()

class ArrADT{
    constructor(){
      this.array = [];
    }
    add(data){
       this.array.push(data);
    }
    remove(data){
      if(this.array.includes(data)){
        this.array = this.array.filter(item => item !== data)
      }else{
        console.log(data+ " does not exist in the array");
      }
    }
    getAtIndex(index){
      if(index <= this.array.length){
        return this.array[index];
      }else{
        return "index not found";
      }
    }
    search(data){
      const index = this.array.indexOf(data);
      if(~index){
        return index
      }
      return null;
    }
    insertAtIndex(item, index){
      this.array.splice(index, 0, item);
    }
    length(){
      return this.array.length;
    }
    print(){
      console.log(this.array.join(" "));
    }
  }


const array = new ArrADT();
array.add(1);
array.add(4);
array.add(5);
array.add(6);
array.insertAtIndex(3,0);
array.print();
console.log(array.length());
array.remove(7);
array.remove(6);
console.log(array.length());
console.log(array.getAtIndex(2));
array.print();
console.log(array.search(5));
