<?php 

namespace App\Handlers;

interface IPrinter
{
  public function setPageLayout(IPageLayout $layout);

  public function setInkColor(string $color);

  public function writeLine(string $text);
}