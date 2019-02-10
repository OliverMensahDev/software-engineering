let multiplesOf2  = (num)=>{
  if( num == 4) return num  ;
  return multiplesOf2( num * 1 );
}
console.log(multiplesOf2(2));
