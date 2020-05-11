<?php 

echo "There are $argc arguments\n";

for ($i=0; $i < $argc; $i++) {
    echo $argv[$i] . "\n";
}