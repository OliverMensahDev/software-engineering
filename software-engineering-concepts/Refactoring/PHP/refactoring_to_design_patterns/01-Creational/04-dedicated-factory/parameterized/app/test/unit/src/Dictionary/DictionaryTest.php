<?php

namespace App\Dictionary;

use App\Helpers\HelperUtils;
use App\Search\WebServiceDefinitionSearch;
use PHPUnit\Framework\TestCase;

class DictionaryTest extends TestCase
{
  /**
   * @test
   */

  public function dicTest()
  {
    $dic = new GeneralDictionary(new WebServiceDefinitionSearch(new HelperUtils, Language::ENGLISH()));
    $definitions = $dic->getDefinitions("computer");
    $this->assertEquals(1, count($definitions));
  }
}
