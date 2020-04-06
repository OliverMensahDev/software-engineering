<?php 
final class Page 
{
  /**
   * @return Page|null
   */

  public function findOneBy($type): ?Page{
    if($page instanceof Page){
      return $page;
    }else{
      return null;
    }
  }
}