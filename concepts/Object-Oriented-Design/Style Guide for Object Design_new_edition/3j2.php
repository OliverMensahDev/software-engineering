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
$this->whereParts[] = $clause;
$this->values[] = $value;
return $this;
}
}