<?php
function myGenerator() {
  yield 'value1';
  yield 'value2';
  yield 'value3';
}


foreach (myGenerator() as $yieldedValue) {
  echo $yieldedValue, PHP_EOL;
}


//range bad 

function makeRange($length) {
  $dataset = [];
  for ($i = 0; $i < $length; $i++) {
   $dataset[] = $i;
  }
    return $dataset;
}
$customRange = makeRange(1000000);
foreach ($customRange as $i) {
  echo $i, PHP_EOL;
}



//range go 
function makeRange1($length) {
  for ($i = 0; $i < $length; $i++) {
    yield $i;
  }
}

foreach (makeRange1(1000000) as $i) {
  echo $i, PHP_EOL;
}


function getRows($file) {
  $handle = fopen($file, 'rb');
  if ($handle === false) {
    throw new Exception();
  }
  while (feof($handle) === false) {
    yield fgetcsv($handle);
  }
  fclose($handle);
}

foreach (getRows('data.csv') as $row) {
  print_r($row);
}