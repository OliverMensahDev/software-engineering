function search(data, target) {
  let start = 0;
  let end = data.length - 1;
  while (start <= end) {
    let mid = Math.floor((start + end) / 2);
    if (target < data[mid]) end = mid - 1;
    else if (target > data[mid]) start = mid + 1;
    else return mid;
  }
  return -1;
}

let data = [1,2,3,5,6,7];
console.log(search(data, 7));