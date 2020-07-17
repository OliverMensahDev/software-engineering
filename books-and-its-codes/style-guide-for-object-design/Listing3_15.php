<?php
// Latitude can't be more than 90.0
expectException(
  InvalidArgumentException . className,
  function () {
    new Coordinates(90.1, 0.0);
  }
);
// Latitude can't be less than -90.0
expectException(
  InvalidArgumentException . className,
  function () {
    new Coordinates(-90.1, 0.0);
  }
);
// Longitude can't be more than 180.0
expectException(
  InvalidArgumentException . className,
  function () {
    new Coordinates(-90.1, 180.1);
  }
);
