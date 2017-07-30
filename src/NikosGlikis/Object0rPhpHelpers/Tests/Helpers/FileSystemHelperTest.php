<?php
namespace NikosGlikis\Object0rPhpHelpers\Tests\Helpers;

use NikosGlikis\Object0rPhpHelpers\Helpers\ArrayHelper;
use NikosGlikis\Object0rPhpHelpers\Helpers\FileSystemHelper;
use PHPUnit_Framework_TestCase;

class FileSystemHelperTest extends PHPUnit_Framework_TestCase
{
    function testGetDirContents()
    {
        $testsDir = __DIR__.'/Data/FilesTest';
        $files  = FileSystemHelper::getDirContents($testsDir);
        $this->assertCount(7, $files);
        $this->assertEquals(
            array (
                '/home/nikos/projects/object0r-php-helpers/src/NikosGlikis/Object0rPhpHelpers/Tests/Helpers/Data/FilesTest/dir1/dir2/file3.txt',
                '/home/nikos/projects/object0r-php-helpers/src/NikosGlikis/Object0rPhpHelpers/Tests/Helpers/Data/FilesTest/dir1/dir2',
                '/home/nikos/projects/object0r-php-helpers/src/NikosGlikis/Object0rPhpHelpers/Tests/Helpers/Data/FilesTest/dir1/dir3',
                '/home/nikos/projects/object0r-php-helpers/src/NikosGlikis/Object0rPhpHelpers/Tests/Helpers/Data/FilesTest/dir1/file4.txt',
                '/home/nikos/projects/object0r-php-helpers/src/NikosGlikis/Object0rPhpHelpers/Tests/Helpers/Data/FilesTest/dir1',
                '/home/nikos/projects/object0r-php-helpers/src/NikosGlikis/Object0rPhpHelpers/Tests/Helpers/Data/FilesTest/file1.txt',
                '/home/nikos/projects/object0r-php-helpers/src/NikosGlikis/Object0rPhpHelpers/Tests/Helpers/Data/FilesTest/file2.txt',
            ),
            $files
        );


        $directories = FileSystemHelper::getDirContents($testsDir, false);
        $this->assertCount(4, $directories);
        $this->assertEquals(
            array (
                '/home/nikos/projects/object0r-php-helpers/src/NikosGlikis/Object0rPhpHelpers/Tests/Helpers/Data/FilesTest/dir1/dir2/file3.txt',
                '/home/nikos/projects/object0r-php-helpers/src/NikosGlikis/Object0rPhpHelpers/Tests/Helpers/Data/FilesTest/dir1/file4.txt',
                '/home/nikos/projects/object0r-php-helpers/src/NikosGlikis/Object0rPhpHelpers/Tests/Helpers/Data/FilesTest/file1.txt',
                '/home/nikos/projects/object0r-php-helpers/src/NikosGlikis/Object0rPhpHelpers/Tests/Helpers/Data/FilesTest/file2.txt',
            ),
            $directories
        );

        $onlyDirectories = FileSystemHelper::getSubDirectories($testsDir);

        $this->assertCount(3, $onlyDirectories);

        $this->assertEquals(
            array (
                '/home/nikos/projects/object0r-php-helpers/src/NikosGlikis/Object0rPhpHelpers/Tests/Helpers/Data/FilesTest/dir1/dir2',
                '/home/nikos/projects/object0r-php-helpers/src/NikosGlikis/Object0rPhpHelpers/Tests/Helpers/Data/FilesTest/dir1/dir3',
                '/home/nikos/projects/object0r-php-helpers/src/NikosGlikis/Object0rPhpHelpers/Tests/Helpers/Data/FilesTest/dir1',
            ),
            $onlyDirectories
        );
    }
}