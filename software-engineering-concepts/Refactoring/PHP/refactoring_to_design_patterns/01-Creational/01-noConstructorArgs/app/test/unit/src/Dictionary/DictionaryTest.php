<?php

namespace App\Dictionary;

use PHPUnit\Framework\TestCase;

class DictionaryTest extends TestCase
{
  /**
   * @test
   */

  public function dicTest()
  {
    $dic = new Dictionary();
    $definitions = $dic->getDefinitions("computer");
    $this->assertEquals(1, count($definitions));
  }
}
