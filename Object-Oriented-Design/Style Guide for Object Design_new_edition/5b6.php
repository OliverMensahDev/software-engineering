<?php 
final class Page 
{
  /**
   * @return Page
   */
  public function getOneByType(PageType $type): Page
  {
    $page = $this->findOneByType($type);
    if (!$page instanceof Page) {
    // Don't return `null`, throw an exception instead:
    throw PageNotFound::withType($type);
  }
    return $page;
  }
}