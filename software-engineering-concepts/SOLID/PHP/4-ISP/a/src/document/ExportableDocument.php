<?php

namespace app\document;

interface ExportableDocument {
  function toPdf();
  function toJson();
  function toTxt();
}