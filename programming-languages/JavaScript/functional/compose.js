const f = (x)=> x+ 2;
const g = (x) => x+ 5
const x = 3
console.log(f(g(x)));


const scream = str => str.toUpperCase();
const exclaim = str => `${str}!`;
const repeat = str =>`${str} ${str}`;
const string = "Egghead.io is awesome";

const result =  repeat(exclaim(scream(string)));
console.log(result);


const compose = (...fns)=> x=>
    fns.reduceRight((acc, fn)=> fn(acc), x);


const enhance = compose(repeat, exclaim, scream);
console.log(enhance(string));