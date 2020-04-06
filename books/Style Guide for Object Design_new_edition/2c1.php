<?php 
final class SpecificException extends InvalidArgumentException
{ 
  
}
try {
// try to create the object
} catch (SpecificException $exception) {
// handle this specific problem in a specific way
}