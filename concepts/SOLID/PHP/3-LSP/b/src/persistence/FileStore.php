<?php
namespace app\persistence;
final class FileStore{
    public function putContent(string $data, string $logFilePath){
            $logFileDirectory = dirname($logFilePath);
            if (!is_dir($logFileDirectory)) {
                mkdir($logFileDirectory, 0777, true);
            }
            touch($logFilePath);
            file_put_contents(
                $logFilePath,
                $data
            );
    }
}