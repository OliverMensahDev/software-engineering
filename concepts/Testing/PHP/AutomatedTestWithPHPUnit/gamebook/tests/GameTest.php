<?php 

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Entity/Game.php";

final class GameTest extends TestCase
{
  public function testImage_WithNull_ReturnsPlaceholder()
  {
    $game = new Game();
    $game->setImagePath(null);
    $this->assertEquals("/images/placeholder.jpg", $game->getImagePath());
  }

  public function testImage_WithPath_ReturnPath()
  {
    $game = new Game();
    $game->setImagePath("/images/game.jpg");
    $this->assertEquals("/images/game.jpg", $game->getImagePath());
  }

  public function testIsRecommended_With5_ReturnsTrue()
  {
    $game = $this->getMockBuilder(Game::class)
                ->setMethodsExcept(['isRecommended'])
                ->setMethods(['getAverageScore']) // mocking the method that is not yet created
                ->getMock();
    $game->method('getAverageScore')->willReturn(5);

    $this->assertTrue($game->isRecommended());
  }

  public function testIsRecommended_With2_ReturnsFalse()
  {
    $game = $this->getMockBuilder(Game::class)
                  ->setMethodsExcept(['isRecommended'])
                  // ->setMethods(['getAverageScore']) // method is created
                  ->getMock();
    $game->method('getAverageScore')->willReturn(2);

    $this->assertFalse($game->isRecommended());
  }

}