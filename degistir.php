<?php
$dosya="users.txt";

$ac=fopen($dosya,"r");
$boyut = filesize($dosya);
$oku=fread($ac,$boyut);
$str=str_replace("5","",$oku);
/********************************************************/
//Değiştirdiğimiz İçeriği Yazıyoruz

$yaz_dosya="users.txt";

$yaz_ac=fopen($dosya,"w");

fwrite($yaz_ac,$str);

?>
