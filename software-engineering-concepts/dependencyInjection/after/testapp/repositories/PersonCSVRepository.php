<?php 
namespace testapp\repositories;

use testapp\sharedObjects\Person;

final class PersonCSVRepository implements IPerson
{ 
  private $data = [];
  public function __construct($csvFile)
  {
    $this->csvFile = $csvFile;
  }

  public function getPeople(): array 
  {
    // open the CVS file
    $handle = @fopen( $this->csvFile, "r");
    if ( !$handle ) {
        throw new \Exception( "Couldn't open $this->csvFile!" );
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

  public function addPerson(Person $person)
  {

  }
}