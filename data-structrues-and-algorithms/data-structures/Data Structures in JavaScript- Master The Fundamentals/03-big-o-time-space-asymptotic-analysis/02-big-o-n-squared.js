class ArrayList {
    constructor() {
        this.data = new Array(20);
        this.size = 0;
    }

    // O(1) constant time
    // this function always takes a constant amount of time to run
    // no matter how many things are in the array
    size() {
        return this.size
    }

    // O(1) constant time 
    // it always takes the same constant amount of time to append
    // just to the end of the arrray
    append(value) {
        this.data[this.size] = value
        this.size++
    }

    // O(N) linear time 
    // this function will take more time directly proportional to the amount
    // of items in the array.
    removeAtIndex(index) {
        for (let i = index; i < this.size - 1; i++) {
            // shift values left to replace the index that was removed
            this.data[i] = this.data[i + 1]
        }
        this.data[this.size - 1] = null
        this.size--
    }

    // O(N^2) quadratic time
    // this function will take longer with a ratio of
    // N^2 amount of time per N items in the array
    // return true or false depending on if there's any duplicate value in the array
    containsDuplicates() {
        for (let i = 0; i < this.size; i++) {
            for (let j = 0; j < this.size; j++) {
                // two identical values appear at different positions in the array
                if (i !== j && this.data[i] === this.data[j]) {
                    return true
                }
            }
        }
        return false
    }
}

function tallySort(aa) {
    // find the max number in the array
    let max = aa[0];
    for (let i = 0; i < aa.length; i++) {
        max = Math.max(max, aa[i]);
    }

    // tally all the numbers
    let tally = new Array(max);
    for (let i = 0; i < aa.length; i++) {
        let value = aa[i];
        if (tally[value] === undefined) {
            tally[value] = 0
        }
        tally[value]++
    }
    // use tallies to sort
    let result = new Array(aa.length);
    let index = 0;
    for (let i = 0; i < tally.length; i++) {
        let occurences = tally[i]
        let n = 0;
        while (n < occurences) {
            result[index] = i;
            index++;
            n++;
        }
    }
    return result;
}

// Logarithmic runtime - Big O Notation: O (log n)
function binarySearch(array, key) {
    let low = 0;
    let high = array.length - 1;
    let mid;
    let element;
    
    while (low <= high) {
        mid = Math.floor((low + high) / 2, 10);
        element = array[mid];
        if (element < key) {
            low = mid + 1;
        } else if (element > key) {
            high = mid - 1;
        } else {
            return mid;
        }
    }
    return -1;
}

let aa = tallySort([3,0, 4, 5])
console.log(binarySearch(aa, 4))
