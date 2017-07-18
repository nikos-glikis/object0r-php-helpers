<?php

namespace NikosGlikis\Object0rPhpHelpers\Helpers;

class ImageHelper
{
    /**
     * Writes a valid transparent 1x1 pixel png file on $filename
     * @param $filename - The filename where to write the bytes.
     */
    public static function writeTransparentPng($filename)
    {
        file_put_contents($filename, self::getTransparentPngBytes());
    }

    /**
     * Returns the bytes for a valid 1x1 png image.
     *
     * @return bool|string
     */
    public static function getTransparentPngBytes()
    {
        return base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAAA1BMVEUAAACnej3aAAAAAXRSTlMAQObYZgAAAApJREFUCNdjYAAAAAIAAeIhvDMAAAAASUVORK5CYII=');
    }

    public static function outputTransparentPng()
    {
        header('Content-Type: image/png');
        echo self::getTransparentPngBytes();
    }

    /**
     * Writes a valid transparent 1x1 pixel  gif file on $filename
     * @param $filename - The filename where to write the bytes.
     */
    public static function writeTransparentGif($filename)
    {
        file_put_contents($filename, self::getTransparentGifBytes());
    }

    /**
     * Returns the bytes for a valid 1x1 png image.
     *
     * @return bool|string
     */
    public static function getTransparentGifBytes()
    {
        return base64_decode('R0lGODlhAQABAJAAAP8AAAAAACH5BAUQAAAALAAAAAABAAEAAAICBAEAOw==');
    }

    /**
     * Outputs a valid image/gif image od zero pixel.
     */
    public static function outputTransparentGif()
    {
        header('Content-Type: image/gif');
        echo self::getTransparentGifBytes();
    }
}

?>