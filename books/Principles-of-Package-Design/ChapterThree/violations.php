<?php
//1 
interface FileInterface
{
  public function rename(string $name): void;

  public function changeOwner(string $user, string $group): void;
}


class DropboxFile implements FileInterface
{
  public function rename(string $name): void
  {
    //....
  }

  public function changeOwner(string $user, string $group): void
  {
    throw new BadMethodCallException("Not implemented for Dropbox files");
  }
}
// solution 

interface FileInterface
{
  public function rename(string $name): void;
}
interface FileWithOwnerInterface extends FileInterface
{
  public function changeOwner(string $user, string $group): void;
}
class DropboxFile implements FileInterface
{
  public function rename(string $name): void
  {
    //....
  }
}
class LocalFile implements FileWithOwnerInterface
{
  public function rename(string $name): void
  {
    //....
  }

  public function changeOwner(string $user, string $group): void
  {
   //...
  }
}
