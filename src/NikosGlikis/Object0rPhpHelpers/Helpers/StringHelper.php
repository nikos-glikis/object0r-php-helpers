<?php
namespace NikosGlikis\Object0rPhpHelpers\Helpers;

class StringHelper
{
    /**
     * Check if string contains substring.
     *
     * @param $haystack
     * @param $needle
     * @param bool $ignoreCase
     * @return bool
     */
    static function stringContains($haystack, $needle, $ignoreCase = false)
    {
        $needle = strval($needle);
        if ($ignoreCase)
        {
            $haystack = strtolower($haystack);
            $needle = strtolower($needle);
        }
        return strpos($haystack, $needle) !== false;
    }

    /**
     * Cuts full text to the latest keyword that exists in the text.
     * For example if text is: "My fox is blue and my light is white" and keywords = {'blue','light'} the return value is: "is white"
     *
     * It extracts the smallest possible text.
     *
     * @param $fullText
     * @param $keywords
     * @return string
     */
    static public function cutToKeywords($fullText, $keywords)
    {
        $pos = 0;
        $fullText = strtolower(' ' . $fullText . ' ');
        foreach ($keywords as $searchKeyword)
        {
            $searchKeyword = strtolower($searchKeyword);
            if (!$searchKeyword || $searchKeyword == ' ')
            {
                continue;
            }
            //var_dump($searchKeyword);
            $thisPos = strpos($fullText, $searchKeyword . ' ');
            if ($thisPos > $pos)
            {
                $pos = $thisPos + strlen($searchKeyword);
            }
        }

        //print "$this->tab$this->tab Name1: $name $this->separator";
        //print "$pos$this->separator";
        if ($pos != 0)
        {
            $fullText = substr($fullText, $pos, strlen($fullText));
        }
        return $fullText;
    }

    /**
     * @param $start
     * @param $end
     * @param $fullString
     * @return string
     * @throws \Exception
     */
    static function getStringBetween($start, $end, $fullString)
    {
        if (!StringHelper::stringContains($fullString, $start))
        {
            throw new \Exception('"' . $start . '" is not contained in text.');
        }
        if (!StringHelper::stringContains($fullString, $end))
        {
            throw new \Exception('"' . $end . '" is not contained in text.');
        }
        $fullString = substr($fullString, strpos($fullString, $start)+strlen($start), strlen($fullString));
        if (!StringHelper::stringContains($fullString, $end))
        {
            throw new \Exception('Cannot find "' . $end . '" after "' . $start . '"');
        }

        return substr($fullString, 0, strpos($fullString, $end));
    }

}

?>