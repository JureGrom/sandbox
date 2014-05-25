<?php
/**
 * Created by PhpStorm.
 * User: juregrom
 * Date: 25/05/14
 * Time: 22:50
 */

namespace jureg;


class ParsingResultTest extends \PHPUnit_Framework_TestCase {

    public function testParsing()
    {
        $t = new ParsingResult("+38651234567");

        $this->assertEquals(386,$t->cntDiallingCode);
        $this->assertEquals("SI",$t->cntIsoCode);
        $this->assertEquals(51234567,$t->subscriber);
        $this->assertEquals("MOBILE",$t->mnoIdentifier);
    }


}
 