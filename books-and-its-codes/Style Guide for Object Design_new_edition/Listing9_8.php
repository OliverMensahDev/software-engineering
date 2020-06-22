<?php
final class MultipleLoaders implements FileLoader
{
    private array loaders;

    public function __construct(array loaders)
    {
        Assertion.allIsInstanceOf(loaders, FileLoader.className);
        Assertion.allIsString(array_keys(loaders));
        this.loaders = loaders;
    }

    public function loadFile(string filePath): array
    {
        extension = pathinfo(filePath, PATHINFO_EXTENSION);
        if (!isset(this.loaders[extension])) {
            throw new CouldNotLoadFile(
                'There is no loader for file extension "{extension}"'
            );
        }

        return this.loaders[extension].loadFile(filePath);
    }
}

parameterLoader = new ParameterLoader(
    new MultipleLoaders([
        'json' => new JsonFileLoader(),
        'xml' => new XmlFileLoader()
    ]);
);
parameterLoader.load('parameters.json');
parameterLoader.load('parameters.xml');

parameterLoader.load('parameters.yml');

