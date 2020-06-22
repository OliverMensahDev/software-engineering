<?php
final class ParameterLoader
{
    private FileLoader fileLoader;

    public function __construct(FileLoader fileLoader)
    {
        this.fileLoader = fileLoader;
    }

    public function load(filePath): array
    {
        // ...

        foreach (/* ... */) {
            if (/* ... */) {
                rawParameters = this.fileLoader.loadFile(
                    filePath
                );
            }
        }

        // ...
    }
}

parameterLoader = new ParameterLoader(new JsonFileLoader());
parameterLoader.load(__DIR__ . '/parameters.json');