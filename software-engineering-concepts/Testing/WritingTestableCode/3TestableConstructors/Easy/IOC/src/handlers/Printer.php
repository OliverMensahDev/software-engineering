<?php

namespace App\Handlers;

use Exception;

class Printer implements IPrinter
{
  public function setInkColor(string $red)
  {
    // throw new Exception("Not Implemented Yet");
  }

  public function setPageLayout(IPageLayout $logic)
  {
    // throw new Exception("Not Implemented Yet");
  }

  public function writeLine(string $text)
  {
    // throw new Exception("Not Implemented Yet");
    echo "$text \n";
  }
}
