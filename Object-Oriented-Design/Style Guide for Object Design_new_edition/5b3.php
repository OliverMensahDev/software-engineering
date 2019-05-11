<?php 
final class User 
{
  /**
   * @return User
   */

  public function getById($id): User{
    if(!$user instanceof User){
      throw UserNotFount::withId($id);
    }
    return $user;
  }
}