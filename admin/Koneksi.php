<?php
$host="localhost";
$user="root";
$pass="";
//Script konek ke database
mysql_connect($host, $user, $pass) or die (mysql_error());
//Dipilih database nya apa...
mysql_select_db("toko_online") or die (mysql_error());
?>