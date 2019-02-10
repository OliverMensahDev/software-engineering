<?php
// final class Printer {
    
//     public function ignoreErrors(bool $ignoreErrors): void{
//         $this->ignoreErrors = $ignoreErrors;
//     }
//     public function print(){
//         if($this->ignoreErrors) {
//             echo "Error ignored";
//         }
//         else{
//             echo "Errors not ignored";
//         }
//     }
// // ...
// }
// $printer = new Printer();
// $printer->ignoreErrors(false);
// $printer->print();



final class Printer {
    
    public function __construct(bool $ignoreErrors){
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
$ignoreErrors = true;
$printer = new Printer($ignoreErrors);
$printer->print();