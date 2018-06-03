function MyArray(){
  this.array = [];
}

MyArray.prototype.add = function(data){
  this.array.push(data);
};

MyArray.prototype.remove = function (data) {
  if(this.MyArray.includes(data)){
    this.MyArray = this.MyArray.filter((item) => {
      return item !== data;
    });
  }else{
    console.log(data+ " does not exist")
  }
};

MyArray.prototype.search = function(data) {
  var findIndex = this.MyArray.indexOf(data);
  if(~findIndex){
    return findIndex;
  }
};
