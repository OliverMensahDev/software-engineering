<?php 
function div($a, $b){
  if($b <= 0){
    throw new Exception("You cannot divide by zero or less");
  }
  return $a/$b;
}

try {
  div(2, 0);
} catch (\Throwable $th) {
echo $th->getMessage();
}
