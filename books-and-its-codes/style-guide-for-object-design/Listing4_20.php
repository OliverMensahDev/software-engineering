<?php 
function the_player_starts_at_a_position_and_can_move_left(): void
{
    initialPosition = new Position(10, 20);
    player = new Player(initialPosition);

    assertSame(initialPosition, player.currentPosition());
 
    player.moveLeft(4);

    assertEquals(new Position(6, 20), player.currentPosition());
 }

