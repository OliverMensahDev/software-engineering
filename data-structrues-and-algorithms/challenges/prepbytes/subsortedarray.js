let unsorted = [10, 12, 20, 30, 25, 40, 32, 31, 35, 50, 60]
// unsorted = [0, 1, 15, 25, 6, 7, 30, 40, 50]

// Find the index at which array is unsorted from left to right
function leftUnsortedIndex() {
  for (i = 0; i < unsorted.length; i++) {
    let isGreater = unsorted[i + 1] > unsorted[i]
    if (!isGreater) {
      return i
    }
  }
}

// Find the index at which the array is unsorted from right to left
function rightUnsortedIndex() {
  for (i = unsorted.length - 1; i >= 0; i--) {
    let isLesser = unsorted[i - 1] < unsorted[i]
    if (!isLesser) {
      return  i + 1
    }
  }
}

function output(left, right){
  console.log(`The unsorted subarray which makes the given array sorted lies between the indices ${left} and ${right}`)
}

const left = leftUnsortedIndex()
const right = rightUnsortedIndex()
output(left, right)
