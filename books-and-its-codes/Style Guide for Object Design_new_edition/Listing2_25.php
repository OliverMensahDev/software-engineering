<?php
// When we use the `Importer` now, it will ignore errors...
// When we use it now, it won't ignore errors any
final class Importer {
    
    public function ignoreErrors(bool $ignoreErrors): void{
        $this->ignoreErrors = $ignoreErrors;
    }
    public function print(){
        if($this->ignoreErrors) {
            echo "Error ignored";
        }
        else{
            echo "Errors not ignored";
        }
    }
// ...
}
$importer = new Importer();
$importer->ignoreErrors(false);
$importer->print();