<?php 
final class Page 
{
  /**
   * @return Page
   */

  public function findOneBy($type):Page
  {
    if(!$page instanceof Page){
      return new EmptyPage();
    }
    return $page;
  }
}