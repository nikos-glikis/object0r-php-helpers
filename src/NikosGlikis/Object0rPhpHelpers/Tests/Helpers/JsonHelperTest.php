<?php

namespace NikosGlikis\Object0rPhpHelpers\Tests\Helpers;

use NikosGlikis\Object0rPhpHelpers\Helpers\JsonHelper;
use NikosGlikis\Object0rPhpHelpers\Helpers\StringHelper;
use PHPUnit_Framework_TestCase;


class JsonHelperTest extends PHPUnit_Framework_TestCase
{
    function testIsValidJson()
    {
        $valid = JsonHelper::isValidJson('fsdfsd');
        $this->assertFalse($valid);

        $valid = JsonHelper::isValidJson('{\'Organization\': \'PHP Documentation Team\'}');
        $this->assertFalse($valid);

        $valid = JsonHelper::isValidJson("{
    \"glossary\": {
        \"title\": \"example glossary\",
		\"GlossDiv\": {
            \"title\": \"S\",
			\"GlossList\": {
                \"GlossEntry\": {
                    \"ID\": \"SGML\",
					\"SortAs\": \"SGML\",
					\"GlossTerm\": \"Standard Generalized Markup Language\",
					\"Acronym\": \"SGML\",
					\"Abbrev\": \"ISO 8879:1986\",
					\"GlossDef\": {
                        \"para\": \"A meta-markup language, used to create markup languages such as DocBook.\",
						\"GlossSeeAlso\": [\"GML\", \"XML\"]
                    },
					\"GlossSee\": \"markup\"
                }
            }
        }
    }
}");
        $this->assertTrue($valid);
        $valid = JsonHelper::isValidJson("{\"menu\": {
  \"id\": \"file\",
  \"value\": \"File\",
  \"popup\": {
    \"menuitem\": [
      {\"value\": \"New\", \"onclick\": \"CreateNewDoc()\"},
      {\"value\": \"Open\", \"onclick\": \"OpenDoc()\"},
      {\"value\": \"Close\", \"onclick\": \"CloseDoc()\"}
    ]
  }
}}");
        $this->assertTrue($valid);
    }

}