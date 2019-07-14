<?php
namespace App\DataStorage;

interface DataProvider 
{
  function getPeople(): array;
}