<?php
expectException(
  InvalidArgumentException . className,
  'Longitude',
  function () {
    new Coordinates(-90.1, 180.1);
  }
);
