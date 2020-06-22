<?php
final class ReplaceParametersWithEnvironmentVariables
implements FileLoader
{
private FileLoader fileLoader;
private array envVariables;

public function __construct(
    FileLoader fileLoader,
    array envVariables
) {
    this.fileLoader = fileLoader;
    this.envVariables = envVariables;
}

public function loadFile(string filePath): array
{
    parameters = this.fileLoader.loadFile(filePath);

    foreach (parameters as key => value) {              
        parameters[key] = this.replaceWithEnvVariable(
            value
        );
    }

    return parameters;
}

private function replaceWithEnvVariable(string value): string
{
    if (isset(this.envVariables[value])) {
        return this.envVariables[value];
    }

    return value;
}
}

parameterLoader = new ParameterLoader(
new ReplaceParametersWithEnvironmentVariables(
    new MultipleLoaders([
        'json' => new JsonFileLoader(),
        'xml' => new XmlFileLoader()
    ]),
    [
        'APP_ENV' => 'dev',
    ]
)
);

