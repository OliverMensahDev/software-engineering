<?php 
namespace App\Handlers;

abstract class InvoiceStatus
{
  const OPEN   = "Open";
  const CLOSED  = "Closed";
  const CANCELLED = "Cancelled";
}