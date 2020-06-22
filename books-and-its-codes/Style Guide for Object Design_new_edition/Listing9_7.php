<?
interface FileLoader
{
    /**
     * ...
     *
     * @throws CouldNotLoadFile
     */
    public function loadFile(string filePath): array
}

final class MultipleLoaders implements FileLoader
{
    private array loaders;

    public function __construct(array loaders)
    {
        Assertion.allIsInstanceOf(loaders, FileLoader.className);
        this.loaders = loaders;
    }

    public function loadFile(string filePath): array
    {
        lastException = null;

        foreach (this.loaders as loader) {
            try {
                return loader.loadFile(filePath);
            } catch (CouldNotLoadFile exception) {
                lastException = exception;
            }
        }

        throw new CouldNotLoadFile(
            'None of the file loaders was able to load file "{filePath}"',
            lastException
        );
    }
}