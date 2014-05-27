<?php
/**
 * Created by PhpStorm.
 * User: juregrom
 * Date: 27/05/14
 * Time: 23:55
 */

namespace jureg;

require 'vendor/autoload.php';

use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberToCarrierMapper;

class ParsingResult
{
    public $mnoIdentifier;
    public $cntDiallingCode;
    public $subscriber;
    public $cntIsoCode;

    public function __construct($msisdn)
    {
        $phoneUtil = PhoneNumberUtil::getInstance();
        $parsedPN = $phoneUtil->parseAndKeepRawInput($msisdn, "SI");

        $this->cntDiallingCode = $parsedPN->getCountryCode();
        $this->subscriber = $parsedPN->getNationalNumber();
        $this->cntIsoCode = $phoneUtil->getRegionCodeForNumber($parsedPN);
        $mapper = PhoneNumberToCarrierMapper::getInstance();
        $this->mnoIdentifier = $mapper->getNameForNumber($parsedPN, "en");
    }
}
