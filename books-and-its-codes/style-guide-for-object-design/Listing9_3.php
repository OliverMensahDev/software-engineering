<?
final class ParameterLoader
{
    public function load(filePath): array
    {
        rawParameters = json_decode(
            file_get_contents(filePath),
            true
        );

        parameters = [];

        foreach (rawParameters as key => value) {
            parameters[] = new Parameter(key, value);
        }

        return parameters;
    }
}

loader = new ServiceConfigurationLoader(
    __DIR__ . '/parameters.json'
);