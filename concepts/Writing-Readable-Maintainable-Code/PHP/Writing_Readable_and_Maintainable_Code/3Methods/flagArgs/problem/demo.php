<?php

function switchLights($room, bool $on)
{
  if ($on) {
    echo "Room $room is turned on";
  } else {
    echo "Room $room is turned off";
  }
}

switchLights("Office", true);