<?php
//SET HEADERS
header('Content-Type: audio/wav');
header('Content-Disposition: inline; filename="audio.wav"');

$text = $_GET['text'];
$perl = "/usr/bin/perl";
$googletts = dirname(__FILE__) . '/googletts-cli.pl';
$temp_file =  dirname(__FILE__).'/'.uniqid().".wav";

//GENERATE TTS FILE
exec( sprintf('%s %s -r 8000 -t "%s" -o %s', $perl, $googletts, $text, $temp_file) );                                                                                             
//STREAM FILE
readfile($temp_file);

//DELETE FILE
unlink($temp_file);