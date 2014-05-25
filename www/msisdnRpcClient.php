<?php
/**
 * Created by PhpStorm.
 * User: juregrom
 * Date: 26/05/14
 * Time: 00:27
 */
require_once 'jsonRPCClient.php';

$t = new jsonRPCClient('http://localhost/msisdnParser.php');

var_dump($t->parse('+38651364137'));