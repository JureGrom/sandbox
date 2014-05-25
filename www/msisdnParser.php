<?php
/**
 * Created by PhpStorm.
 * User: juregrom
 * Date: 24/05/14
 * Time: 22:30
 */

namespace jureg;

require 'vendor/autoload.php';

use Phonenumbers\PhoneNumberType;
use Phonenumbers\PhoneNumberUtil;

/*
 * returns MNO identifier, country dialling code, subscriber number and country identifier as defined with ISO 3166-1-alpha-2
 * For example, MSISDN + 38640123456 returns si.mobil, 386, 40123456, SI.
 */
class ParsingResult {
    public $mnoIdentifier = "si.mobil";
    public $cntDiallingCode;
    public $subscriber;
    public $cntIsoCode;

    function __construct($msisdn)
    {
        $phoneUtil = PhoneNumberUtil::getInstance();
        $parsedPN = $phoneUtil->parseAndKeepRawInput($msisdn, "SI");

        $this->cntDiallingCode = $parsedPN->getCountryCode();
        $this->subscriber = $parsedPN->getNationalNumber();
        $this->cntIsoCode = $phoneUtil->getRegionCodeForNumber($parsedPN);
        //todo use giggsey PhoneNumberToCarrierMapper
        $type = $phoneUtil->getNumberType($parsedPN);
        $this->setMnoIdentifier($type);
    }

    private function setMnoIdentifier($type)
    {
        switch($type)
        {
            case PhoneNumberType::FIXED_LINE:
                $this->mnoIdentifier = "FIXED_LINE";
                break;
            case PhoneNumberType::FIXED_LINE_OR_MOBILE:
                $this->mnoIdentifier = "FIXED_LINE_OR_MOBILE";
                break;
            case PhoneNumberType::MOBILE:
                $this->mnoIdentifier = "MOBILE";
                break;
            case PhoneNumberType::PAGER:
                $this->mnoIdentifier = "PAGER";
                break;
            case PhoneNumberType::PERSONAL_NUMBER:
                $this->mnoIdentifier = "PERSONAL_NUMBER";
                break;
            case PhoneNumberType::PREMIUM_RATE:
                $this->mnoIdentifier = "PREMIUM_RATE";
                break;
            case PhoneNumberType::TOLL_FREE:
                $this->mnoIdentifier = "TOLL_FREE";
                break;
            case PhoneNumberType::SHARED_COST:
                $this->mnoIdentifier = "SHARED_COST";
                break;
            case PhoneNumberType::UAN:
                $this->mnoIdentifier = "UAN";
                break;
            case PhoneNumberType::UNKNOWN:
                $this->mnoIdentifier = "UNKNOWN";
                break;
            case PhoneNumberType::VOIP:
                $this->mnoIdentifier = "VOIP";
                break;
        }
    }
}

echo json_encode(new ParsingResult("+38651364137"));