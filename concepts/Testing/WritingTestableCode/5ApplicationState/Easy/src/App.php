<?php

use App\Container;
use App\Handlers\Database;
use App\Handlers\InvoiceWriter;
use App\Handlers\PageLayout;
use App\Handlers\Printer;
use App\Handlers\PrintInvoiceCommand;
use App\Handlers\Security;

require "../vendor/autoload.php";

$invoiceId = 1;

$container = new Container();
$container->set(PageLayout::class, function (Container $c) {
  return new PageLayout();
});
$container->set(Database::class, function (Container $c) {
  return new Database();
});
$container->set(Printer::class, function (Container $c) {
  return new Printer();
});
$container->set(InvoiceWriter::class, function (Container $c) {
  return new InvoiceWriter($c->get(Printer::class), $c->get(PageLayout::class));
});
$container->set(PrintInvoiceCommand::class, function (Container $c) {
  return new PrintInvoiceCommand($c->get(Database::class), $c->get(InvoiceWriter::class));
});

$commandInstance = new PrintInvoiceCommand($container->get(Database::class), $container->get(InvoiceWriter::class), new Security());
try {
  $commandInstance->execute($invoiceId);
} catch (\Throwable $th) {
  echo $th->getMessage();
}
