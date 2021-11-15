<?php
ini_set('memory_limit', '256M');
ini_set('max_execution_time', 300);
require_once('../vendor/autoload.php');

$parser = new \Smalot\PdfParser\Parser();
$pdf    = $parser->parseFile('../data/1.pdf');

$text = $pdf->getText();
$text = preg_replace('/\s+/', ' ', trim($text));

if(preg_match_all('/\d (\S{3}\d{7})/is', $text, $matches))
$voterDetails["voterId"] = $matches[1];

if(preg_match_all('/Voter\'s Name:-(.*?)House No :-/is', $text, $matches))
$voterDetails["voterName"] = $matches[1];

if(preg_match_all('/\d :-(.*?)(Voter\'s Name:-|Issued by)/is', $text, $matches))
$voterDetails["fatherName"] = $matches[1];

if(preg_match_all('/House No :-(.*?)Age:-/is', $text, $matches))
$voterDetails["houseNo"] = $matches[1];

if(preg_match_all('/Age:-(.*?)Sex:-/is', $text, $matches))
$voterDetails["age"] = $matches[1];

if(preg_match_all('/Sex:-(.*?)(Father\'s Name|Husband\'s Name)/is', $text, $matches))
$voterDetails["sex"] = $matches[1];

echo json_encode($voterDetails);
