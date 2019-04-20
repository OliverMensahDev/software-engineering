function largestProduct(data){
  let largest = data[0][0] * data[0][1]
  for(let row = 0; row < data.length; row++){
    for(let col = 0; col < data[row].length; col++){
      let current =  data[row][col]      
      if( col + 1 < data[row].length){
        let right  = data[row][col +1]
        largest = Math.max(largest, current * right)
      }

      if(col -1 >= 0 ){
        let left = data[row][col -1]
        largest = Math.max(largest, current * left)
      }

      if(row -1 >= 0 ) {
        let top = data[row-1][col]
        largest = Math.max(largest, current * top)
      }

      if(row + 1 < data.length){
        let bot = data[row + 1][col]
        largest = Math.max(largest, current * bot)
      }
    }
  }
  return largest
}

//keeping track of where we got the largest sum
function largestProduct1(data){
  let largest = data[0][0] * data[0][1]
  let row1 = 0, col1 =0, row2  = 0, col2 = 0;
  for(let row = 0; row < data.length; row++){
    for(let col = 0; col < data[row].length; col++){
      let current =  data[row][col]      
      if( col + 1 < data[row].length){
        let right  = data[row][col +1]
        if(current * right > largest){
          largest = current * right
          row1 = row
          col1 = col 
          row2 = row
          col2 = col + 1
        }
      }

      if(col -1 >= 0 ){
        let left = data[row][col -1]
        if(current * left > largest){
          largest = current * left
          row1 = row
          col1 = col 
          row2 = row
          col2 = col -1 
        }
      }

      if(row -1 >= 0 ) {
        let top = data[row-1][col]
        if(current * top > largest){
          largest = current * top
          row1 = row
          col1 = col 
          row2 = row -1
          col2 = col
        }      }

      if(row + 1 < data.length){
        let bot = data[row + 1][col]
        if(current * bot > largest){
          largest = current * bot
          row1 = row
          col1 = col 
          row2 = row + 1
          col2 = col
        }      
      }
    }
  }
 
  return `${data[row1][col1]} * ${data[row2][col2]} = ${largest}`
}


// Abstract repetitions into helper function
function largestProduct2(data){
  let largest = data[0][0] * data[0][1]
  let row1 = 0, col1 =0, row2  = 0, col2 = 0;

  function updateLargest(r1, c1, r2, c2){
    let current = data[r1][c1]
    let other  = data[r2][c2]
    if(current * other > largest){
      largest = current * other
      row1 = r1
      col1 = c1 
      row2 = r2
      col2 = c2
    }
  }
  for(let row = 0; row < data.length; row++){
    for(let col = 0; col < data[row].length; col++){
      if( col + 1 < data[row].length){
        updateLargest(row, col, row, col +1)
      }

      if(col -1 >= 0 ){
        updateLargest(row, col, row, col -1)
      }

      if(row -1 >= 0 ) {
        updateLargest(row , col + 1, row, col)
      }

      if(row + 1 < data.length){
        updateLargest(row, col, row+ 1, col)
      }
    }
  }
 
  return `${data[row1][col1]} * ${data[row2][col2]} = ${largest}`
}

// abstract getcell value
// Abstract repetitions into helper function
function largestProduct3(data){
  let largest = data[0][0] * data[0][1]
  let row1 = 0, col1 =0, row2  = 0, col2 = 0;

  function getCell(row, col){
    if(row < 0 ) return 
    if(col < 0) return 
    if(col >= data[row].length) return 
    if(row >= data.length) return 
    return data[row][col]
    }

  function updateLargest(r1, c1, r2, c2){
    let current = getCell(r1, c1)
    let other  = getCell(r2, c2)
    if(current * other > largest){
      largest = current * other
      row1 = r1
      col1 = c1 
      row2 = r2
      col2 = c2
    }
  }
  for(let row = 0; row < data.length; row++){
    for(let col = 0; col < data[row].length; col++){
        updateLargest(row, col, row, col -1) //left
        updateLargest(row, col, row, col -1) //right
        updateLargest(row , col, row -1, col) //top
        updateLargest(row , col + 1, row, col) //bottom
    }
  }
 
  return `${data[row1][col1]} * ${data[row2][col2]} == ${largest}`
}





const arr = [
  [1, 1, 3, 4],
  [6, 8, 2, 9]
]
console.log(largestProduct2(arr));
