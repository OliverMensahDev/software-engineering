<?
final class FileLogger
{
    private string filePath;

    public function __construct(string filePath)
    {
        this.filePath = filePath;
    }

    public function log(message): void
    {
        file_put_contents(this.filePath, message, FILE_APPEND);
    }
}

logger = new FileLogger('/var/log/app.log');