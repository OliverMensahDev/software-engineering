<?php 

//Before
final class ConfigWriter {
    public function write(array $config, string $targetFilePath): void {
        // json_encode() is a hidden dependency:
        file_put_contents(
            $targetFilePath,
            json_encode($config)
        );
    }
}
$writer = new ConfigWriter();
$writer->write(array("me", "u"), "/home/olivermensah/Desktop/daily-practices/OD/logs/config.txt");



/*
* The `JsonEncoder` class "wraps" the native `json_encode()`
* function:
*/
final class JsonEncoder{
    public function encode(array $data): string{
        /*
        * Wrapping `json_encode()` in a service object will save us
        * from forgetting to call it in the right way:
        */
        return json_encode(
            $data,
            JSON_THROW_ON_ERROR | JSON_FORCE_OBJECT
        );
    }
}

final class ConfigWriter1{
    // private JsonEncoder $jsonEncoder;
    public function __construct(JsonEncoder $jsonEncoder){
        /*
        * A `JsonEncoder` instance can now be injected as an
        * actual, explicit dependency.
        */
        $this->jsonEncoder = $jsonEncoder;
    }
    public function write(array $config,string $targetFilePath): void {
        file_put_contents(
            $targetFilePath,
            $this->jsonEncoder->encode($config)
        );
    }
}

$writer = new ConfigWriter1(new JsonEncoder());
$writer->write(array("another", "hereu"), "/home/olivermensah/Desktop/daily-practices/OD/logs/config.txt");