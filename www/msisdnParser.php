<?php
/**
 * Created by PhpStorm.
 * User: juregrom
 * Date: 24/05/14
 * Time: 22:30
 */

namespace jureg;

require 'vendor/autoload.php';
require_once 'jsonRPCServer.php';
require_once 'ParsingResult.php';

use jsonRPCServer;

class MSISDNParser
{
    public function parse($phoneNumber)
    {
        return new ParsingResult($phoneNumber);
    }
}

jsonRPCServer::handle(new MSISDNParser());
