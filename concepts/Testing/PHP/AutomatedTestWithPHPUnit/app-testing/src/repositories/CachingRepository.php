<?php 
namespace testapp\repositories;

use testapp\sharedObjects\Person;

final class CachingRepository implements IPerson
{
  private $iperson; 
  private $cachedItems;

  public function __construct(IPerson $iperson)
  {
    $this->iperson = $iperson;
  }

  public function getPeople(): array 
  {
    return $this->cachedItems;
  }

  public function addPerson(Person $person)
  {

  }

  public function cachedData()
  {
    $this->cachedItems = $this->iperson->getPeople();
  }

  public function invalidateCache(){
    $this->cachedItems = [
      new Person("No data", "Nod data", 0)
    ];
  } 
}