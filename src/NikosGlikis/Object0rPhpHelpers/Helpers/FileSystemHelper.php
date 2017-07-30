<?php
namespace NikosGlikis\Object0rPhpHelpers\Helpers;

class FileSystemHelper
{
    /**
     * Returns the list of files recursively.
     *
     * @param $dir - The directory to search files for.
     * @param bool $includeDirectories - If true, directories are included.
     * @param array $results
     * @return array
     */
    static function getDirContents($dir, $includeDirectories = true, &$results = array()){
        $files = scandir($dir);

        foreach($files as $key => $value){
            $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
            if(!is_dir($path)) {
                $results[] = $path;
            } else if($value != "." && $value != "..") {
                self::getDirContents($path, $includeDirectories, $results);
                if ($includeDirectories) {
                    $results[] = $path;
                }
            }
        }

        return $results;
    }

    /**
     * Returns the list of subdirectories recursively.
     *
     * @param $dir - The directory to search directories for.
     * @param array $results
     * @return array
     */
    static function getSubDirectories($dir,  &$results = array())
    {
        $files = scandir($dir);

        foreach($files as $key => $value)
        {
            $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
            if(!is_dir($path))
            {
                //$results[] = $path;
            }
            else if($value != "." && $value != "..")
            {
                self::getSubDirectories($path,  $results);
                    $results[] = $path;
            }
        }
        return $results;
    }


}

?>