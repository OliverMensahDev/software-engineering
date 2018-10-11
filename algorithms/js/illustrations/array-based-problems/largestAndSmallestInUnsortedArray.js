function getLargestAndSmallest(numbers){
    let largest = numbers[0];
    let smallest =  numbers[0];
    let remaining = numbers.slice(1);  
    for (let  number of  remaining) {
         if (number > largest) { 
             largest = number; 
        } else if (number < smallest) {
             smallest = number; 
        }
    } 
    return {
        largest,
        smallest
    };
}

let data  = [0, 9, 10, 2, 4, 6, -1];
console.log(getLargestAndSmallest(data));
