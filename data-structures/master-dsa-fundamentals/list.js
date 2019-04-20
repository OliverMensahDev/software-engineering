class List {
  constructor(){
    console.log("Created");
    this.data = new Array(3);
    this.size = 0
  }

  push(value){
    if(this.size === this.data.length) this.grow()
    this.data[this.size] = value
    this.size++
  }

  grow(){
    let aa = new Array(this.data.length * 2)
    for(let i =0; i< this.data.length; i++){
      aa[i] = this.data[i]
    }
    this.data = aa
  }

  remove(index){
    if(this.size === 0) return null
    let removed = this.data[index]
    for(let i= index; i<this.size - 1; i++){
      this.data[i] = this.data[i+1]
    }
    delete this.data[this.size -1] 
    this.size-- 
    return removed

  }
  add(value, index){
    if(this.size === this.data.length){
      this.grow()
    }
    for(let i = this.size; i > index; i--){
      this.data[i]  = this.data[i-1]
    }
    this.data[index] = value
    this.size++
  }

  contains(value){
    for(let i =0 ; i < this.size; i++){
      if(this.data[i] == value) return true
    }
    return false;
  }
  get(index){
    if(index >= 0 && index < this.size){
      return this.data[index];
    }
  }

  set(index, value){
    if(index >= 0 && index < this.size){
      this.data[index] = value;
    }
  }
  
  concat(other){
    //immutable
    // let result = new List()
    // for(let i =0;  i< this.size; i++){
    //   result.push(this.get(i))
    // }
    // for(let i = 0; i < other.size; i++){
    //   result.push(other.get(i))
    // }
    // return result;

    //mutated
    for(let i = 0; i < other.size; i++){
      this.push(other.get(i))
    }
    return this;
  }

  toString(){
    if(this.size === 0) return "[]"
    else{
      let res = ""
      for(let i = 0; i < this.size; i++){
        res += this.data[i] + " "
      }
      return "[ " + res + "]"
    }
  }

}

const ll = new List()
ll.push(1)
ll.push(3)
ll.push(5)
ll.push(8)
ll.remove(3)
// ll.push(10)
// ll.push(55)
// ll.push(90)
ll.add(200, 0)
ll.set(1, 100)


const l = new List()
l.push(10)
l.push(30)
l.push(50)

b = ll.concat(l)

console.log(ll.toString());


