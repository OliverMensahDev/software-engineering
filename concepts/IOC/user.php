<?php 
namespace container; 
use container\SessionStorage;

class User
{
  protected $storage;

  public function __construct(SessionStorage $storage)
  {
    $this->storage = $storage;
  }

  function setLanguage($language)
  {
    $this->storage->set('language', $language);
  }

  function getLanguage()
  {
    return $this->storage->get('language');
  }
}