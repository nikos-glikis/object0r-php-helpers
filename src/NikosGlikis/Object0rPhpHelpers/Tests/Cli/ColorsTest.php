<?php
namespace NikosGlikis\Object0rPhpHelpers\Tests\Cli;

use NikosGlikis\Object0rPhpHelpers\Cli\Colors\PhpAnsiColor;
use PHPUnit_Framework_TestCase;

class ColorsTest extends PHPUnit_Framework_TestCase
{
    function testCli()
    {
        print PhpAnsiColor::set("This must be printed as Green, Bold\n", "green+bold");
        print PhpAnsiColor::set("This must be printed as Cyan, Bold\n", "cyan+bold");
        print PhpAnsiColor::set("This must be printed as Magenta, Bold\n", "magenta+bold");

        print PhpAnsiColor::set("\n", "magenta+bold");

        print PhpAnsiColor::set("This must be printed as Green text, Bold\n", "green");
        print PhpAnsiColor::set("This must be printed as Cyan text, Bold\n", "cyan");
        print PhpAnsiColor::set("This must be printed as Magenta text, Bold\n", "magenta");

        print PhpAnsiColor::set("\n", "magenta+bold");


        print PhpAnsiColor::set("This must be printed as as Black BG, Green text, Bold", "black_bg+green+bold");
        print "\n";

        print PhpAnsiColor::set("This must be printed as as Black BG, Green text", "black_bg+green");
        print "\n";

        print PhpAnsiColor::set("This must be printed as as Black BG, Green text + underline", "black_bg+green+underline");
        print "\n";

        print PhpAnsiColor::set("This must be printed as as Black BG, Green text + underline", "black_bg+green+underline+bold");
        print "\n";

        print PhpAnsiColor::set("Inverse if the above.", "black_bg+green+underline+bold+inverse");
        print "\n";

        print PhpAnsiColor::replace("This is the full text. Full should be red.", 'full', 'red');
        print "\n";
        
        print PhpAnsiColor::replace("This is the full text. Full should be red. Also FuLl is no case insesnitive.", 'full', 'red', 'i');
        print "\n";

    }
}