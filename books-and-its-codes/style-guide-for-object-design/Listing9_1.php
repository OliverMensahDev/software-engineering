<? 
final class FileLogger
{
    public function log(message): void
    {
        file_put_contents(
            '/var/log/app.log',
            message,
            FILE_APPEND
        );
    }
}