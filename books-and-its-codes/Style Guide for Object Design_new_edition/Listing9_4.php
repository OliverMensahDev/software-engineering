<? 
interface FileLoader
{
    public function loadFile(string filePath): array
}

final class JsonFileLoader implements FileLoader
{
    public function loadFile(string filePath): array
    {
        Assertion.isFile(filePath);

        result = json_decode(
            file_get_contents(filePath),
            true
        );

        if (!is_array(result)) {
            throw new RuntimeException(
                'Decoding "{filePath}" did not result in an array'
            );
        }

        return result;
    }
}