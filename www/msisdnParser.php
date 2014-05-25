<?php
/**
 * Created by PhpStorm.
 * User: juregrom
 * Date: 24/05/14
 * Time: 22:30
 */

namespace jureg;

require 'vendor/autoload.php';

use Phonenumbers\PhoneNumberUtil;

/*
 * returns MNO identifier, country dialling code, subscriber number and country identifier as defined with ISO 3166-1-alpha-2
 * For example, MSISDN + 38640123456 returns si.mobil, 386, 40123456, SI.
 */
class ParsingResult {
    public $mnoIdentifier = "si.mobil";
    public $cntDiallingCode;
    public $subscriber;
    public $cntIsoCode = "SI";

    function __construct($msisdn)
    {
        $phoneUtil = PhoneNumberUtil::getInstance();
        $parsedPN = $phoneUtil->parseAndKeepRawInput($msisdn, "SI");

        $this->cntDiallingCode = $parsedPN->getCountryCode();
        $this->subscriber = $parsedPN->getNationalNumber();
    }


}

echo json_encode(new ParsingResult("+38651364137"));