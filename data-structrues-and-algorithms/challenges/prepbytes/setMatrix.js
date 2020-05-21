let matrix = [
  [0, 1, 2, 0],
  [3, 1, 5, 2],
  [1, 3, 1, 5]
];

function soln1(matrix) {
  let rowTotals = matrix.length;
  let columnTotal;
  let tracker = {};
  for (let i = 0; i < rowTotals; i++) {
    columnTotal = matrix[i].length;
    for (let j = 0; j < columnTotal; j++) {
      if (matrix[i][j] == 0) {
        let key = "key" + i + "_" + j;
        tracker[key] = [i, j];
      }
    }
  }
  for (let key in tracker) {
    let i = tracker[key][0];
    let j = tracker[key][1];
    setRowToZero(matrix, i, columnTotal);
    setColumnToZero(matrix, rowTotals, j);
  }
  return matrix;
}

function setRowToZero(matrix, i, j) {
  for (let start = 0; start < j; start++) {
    matrix[i][start] = 0;
  }
}
function setColumnToZero(matrix, i, j) {
  for (start = 0; start < i; start++) {
    matrix[start][j] = 0;
  }
}
console.log(soln1(matrix));
