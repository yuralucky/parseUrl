<?php
namespace Project1;

require_once 'vendor/autoload.php';

$option = getopt('h', ['parse:', 'report:', 'help:']);
$start = new Commander($option);
//$url = new CheckDomain('https://auto.ria.com/uk/');
//$content=new Content($url);
//$filename=new GetFilename($url);
//$object=new ContentRepository($content,$filename);
////print_r( $object->getFilename());
//
//
//$object->saveParseUrl();

//$url = new CheckDomain('habr.com');
//print_r( $url->getDomain());
//$file = new GetFilename($url);
//
//
//$report = new ShowReport($file);
//$report->showReport();

//$url = new CheckDomain('https://dumskaya.net/');
////
//$obj = new Content($url);
////$obj=new CheckDomain('https://habr.com/ru/post/208442/');
////$con=new Content(new CheckDomain('https://habr.com/ru/post/208442/'));
//
////var_dump($con);
//$name=new GetFilename($url);
//$nobj=new ContentRepository($obj,$name);
//print_r ($nobj->getFilename());