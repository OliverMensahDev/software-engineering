<?php 
final class BankStatementImporter{
    // private ?Logger $logger;

    public function __construct(){
        // The `Logger` dependency isn't a constructor argument,
    }
    
    public function setLogger(Logger $logger): void {
        // But it can be optionally provided using this setter.
        $this->logger = $logger;
    }
}
$importer = new BankStatementImporter();
// The `BankStatementImporter` is now ready for use.
/*
* But we can "enrich" it by injecting a `Logger` after
* instantiation:
*/
$importer->setLogger($logger);


// this not for service objects. Service Objects are immutable