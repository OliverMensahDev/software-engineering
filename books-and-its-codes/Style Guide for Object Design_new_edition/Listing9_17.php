<?
class ParameterLoader
{
    public function load(filePath): array
    {
        // ...

        rawParameters = this.loadFile(filePath);

        // ...

        return parameters;
    }

    protected function loadFile(string filePath): array
    {
        return json_decode(
            file_get_contents(filePath),
            true
        );
    }
}