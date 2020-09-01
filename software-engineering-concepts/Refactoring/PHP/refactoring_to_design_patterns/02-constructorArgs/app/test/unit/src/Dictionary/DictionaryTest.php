<?php

namespace App\Dictionary;

use App\Helpers\HttpHelper;
use App\Search\WebServiceDefinitionSearch;
use PHPUnit\Framework\TestCase;

class DictionaryTest extends TestCase
{
  /**
   * @test
   */

  public function dicTest()
  {
    $dic = new Dictionary(new WebServiceDefinitionSearch(new HttpHelper, Language::ENGLISH()));
    $definitions = $dic->getDefinitions("computer");
    $this->assertEquals(1, count($definitions));
  }
}
