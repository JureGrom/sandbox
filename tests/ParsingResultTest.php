<?php
/**
 * Created by PhpStorm.
 * User: juregrom
 * Date: 25/05/14
 * Time: 22:50
 */

namespace jureg;


class ParsingResultTest extends \PHPUnit_Framework_TestCase
{

    public function testParsing()
    {
        $parsingResult = new ParsingResult("+38651234567");

        $this->assertEquals(386, $parsingResult->cntDiallingCode);
        $this->assertEquals("SI", $parsingResult->cntIsoCode);
        $this->assertEquals(51234567, $parsingResult->subscriber);
        $this->assertEquals("Mobitel", $parsingResult->mnoIdentifier);
    }


}
