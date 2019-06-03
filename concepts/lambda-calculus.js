const Y = f => (x=>x(x))(x=> f(y=>x(x)(y)))
const fib = f =>  n => n<= 1 ? n :  f(n-1) + f(n-2)

console.log(Y(fib)(10));
