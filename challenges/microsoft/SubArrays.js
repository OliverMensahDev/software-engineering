function maxSubArraySum(a) {
  let size = a.length;
  let max_so_far = Number.NEGATIVE_INFINITY,
    prev_sum = 0;

  for (let i = 0; i < size; i++) {
    prev_sum = prev_sum + a[i];
    if (max_so_far < prev_sum) max_so_far = prev_sum;
    if (prev_sum < 0) prev_sum = 0;
  }
  return max_so_far;
}

let a = [-1, 2, -5];
console.log("Maximum contiguous sum is " + maxSubArraySum(a));
