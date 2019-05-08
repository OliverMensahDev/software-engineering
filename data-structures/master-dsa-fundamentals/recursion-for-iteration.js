function iterate(arr, index){
  if(index >= arr.length){
    return
  }else{
    console.log(arr[index])
    iterate(arr, index + 1)
  }
}


let aa = [1,3,4,5]
iterate(aa, 0);