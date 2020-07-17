<?
final class XmlFileParameterLoader extends ParameterLoader
{
    protected function loadFile(string filePath): array
    {
        rawXml = file_get_contents(filePath);

        // Convert to array somehow

        return /* ... */;
    }
}