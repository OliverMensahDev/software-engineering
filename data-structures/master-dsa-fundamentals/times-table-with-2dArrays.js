let timeTable = [
  [1,2,3,4,5],
  [2,4,6,8,10],
  [3,6,9, 12, 15],
  [4, 8, 12, 16, 20]
]


function create(data){
  for(let row = 0; row < data.length; row++){
    let line = " "
    for(let col = 0; col < data[row].length; col++){
      line += data[row][col] + " "
    }
    console.log(line)
  }
}

create(timeTable)