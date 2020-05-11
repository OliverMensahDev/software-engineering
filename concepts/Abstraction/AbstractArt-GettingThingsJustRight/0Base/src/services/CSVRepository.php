<?php

namespace App\Services;

use App\Entities\Person;

class CSVRepository
{
  
  public function getPersons(): array 
  {
    // open the CVS file
    $handle = fopen("../resources/people.csv", "r");
    if ( !$handle ) {
        throw new \Exception( "Couldn't open !" );
    }
    // read the first line
    $first = strtolower( fgets( $handle, 4096 ) );
    // get the keys
    $keys = str_getcsv( $first );
    // read until the end of file
    while ( ($buffer = fgets( $handle, 4096 )) !== false ) {
        // read the next entry
        $array = str_getcsv ( $buffer );
        if ( empty( $array ) ) continue;
        $row = [];
        $i=0;
        // replace numeric indexes with keys for each entry
        foreach ( $keys as $key ) {
            $row[ $key ] = $array[ $i ];
            $i++;
        }
        // add relational array to final result
        $this->data[] = new Person($row['name'], $row['gender'], $row['age']);
      }

      fclose( $handle );
      return $this->data;
  }
}