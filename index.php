<?php
date_default_timezone_set("UTC+1");

error_reporting(E_ALL);
ini_set('display_errors','1');

$clientParams = array(
    'location' => 'http://41.206.4.162:8310/SubscribeManageService/services/SubscribeManage',
    'uri' => 'http://41.206.4.162:8310/SubscribeManageService/services/SubscribeManage',
    'trace' => 1
);

$client = new SoapClient('http://localhost/soap/services/sag_subscribe_interface_1_0.wsdl',$clientParams);

$timestamp = date('Ymdhis');

$authParams             = new stdClass();
$authParams->spId       = 2340110004819;
$authParams->spPassword = md5(2340110004819 . 'Huawei12' . $timestamp);
$authParams->timeStamp  = $timestamp;

$headerParam    = new SoapVar($authParams,SOAP_ENC_OBJECT);
$header         = new SoapHeader('NAMESPACE','Auth',$headerParam,false);

$client->__setSoapHeaders(array($header));

$payload = array(
    'userID' => array(
        'ID'    => '+2348161608442',
        'type'  => 0
    ),
    'subInfo' => array(
        'productID' => '23401220000013931',
        'channelID' => '1'
    ),
);
//var_dump($client->__getFunctions());
//die;
$client->__soapCall('SubscribeProductRequest',$payload);
//SubscribeProductRequest