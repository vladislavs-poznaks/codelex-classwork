<?php

namespace Core;

class File
{
    public static function load(string $name)
    {
        $path = 'storage/'
            . $name
            . '.dat';

        return unserialize(self::readDataFromFile($path));
    }

    public static function store($object): void
    {
        $path = 'storage/'
            . self::getClassName($object)
            . '.dat';

        if (! file_exists($path)) {
            self::createFile($path);
        }

        self::writeDataToFile($path, serialize($object));
    }

    public static function fileExists($name): bool
    {
        $path = 'storage/'
            . $name
            . '.dat';

        return file_exists($path);
    }

    private static function getClassName($object): string
    {
        $pathPartials = explode('\\', get_class($object));

        return end($pathPartials);
    }

    private static function createFile($path): void
    {
        $file = fopen($path, 'x+');
        fclose($file);
    }

    private static function writeDataToFile($path, $data): void
    {
        $file = fopen($path, 'w');
        fwrite($file, $data);
        fclose($file);
    }

    private static function readDataFromFile($path): string
    {
        $file = fopen($path, 'r');
        $data = fread($file, filesize($path));
        fclose($file);

        return $data;
    }
}
