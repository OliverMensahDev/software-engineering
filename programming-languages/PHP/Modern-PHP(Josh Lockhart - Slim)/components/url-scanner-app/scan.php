<?php
// 1. Use Composer autoloader
require 'vendor/autoload.php';
// 2. Instantiate Guzzle HTTP client
$client = new \GuzzleHttp\Client();
// 3. Open and iterate CSV

use League\Csv\Reader;
use League\Csv\Statement;

$csv = Reader::createFromPath($argv[1], 'r');
// $csv->setHeaderOffset(0); //set the CSV header offset
$stmt = new Statement();

$records = $stmt->process($csv);
foreach ($records as $record) {
  try {
    // 4. Send HTTP OPTIONS request
    $httpResponse = $client->options($record[0]);
    // 5. Inspect HTTP response status code
    if ($httpResponse->getStatusCode() >= 400) {
      throw new \Exception();
    }
  } catch (\Exception $e) {
  // 6. Send bad URLs to standard out
    echo $record[0] . PHP_EOL;
  }
}

// $csv = new \League\Csv\Reader();
// foreach ($csv as $csvRow) {
 
// }
