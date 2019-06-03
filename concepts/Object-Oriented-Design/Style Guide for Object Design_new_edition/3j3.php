<?php 
final class QueryBuilder
{
/*
* Do these methods update the state of the object they're called
* on, or do they return a modified copy? Or... both?
*/
public function select(): QueryBuilder
{
// ...
}
public function from(): QueryBuilder
{
// ...
}
public function where(string $clause, $value): QueryBuilder
{
  $copy = clone $this;
  $copy->whereParts[] = $clause;
  $copy->values[] = $value;
  return $copy;
}
}