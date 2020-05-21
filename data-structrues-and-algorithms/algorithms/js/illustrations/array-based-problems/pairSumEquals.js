function pairs(array, sum) {
    for (let i = 0; i < array.length; i++) {
      for (let j = 0; j < array.length; j++) {
        if(array[i] + array[j]   ===  sum){
            console.log([array[i], array[j]]);
        }
      }
    } 
   }
   pairs([1, 2, 3], 4);
   
   
   
   
   