<?php

class File
{
    public static function read(string $filename): array
    {
        $file = fopen($filename, "r");
        if (filesize($filename) !== 0) {
            $data = explode(' ', fread($file,filesize($filename)));
        } else {
            $data = [];
        }
        fclose($file);

        return $data;
    }

    public static function write(string $filename, array $data): void
    {
        $file = fopen($filename, 'w');;
        fwrite($file, implode(' ', $data));
        fclose($file);
    }
}
