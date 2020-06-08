<?php
include("fonksiyonlar.php");

if (isset($_POST["kaydol"]))
{
	$kadi = strip_tags($_POST["kadi"]);
	$email = strip_tags($_POST["email"]);
	$sifre = strip_tags($_POST["sifre"]);
	$sifre_tkr = strip_tags($_POST["sifre_tkr"]);
	$ip = $_SERVER["REMOTE_ADDR"];
	$kayit_tarihi = date("d/m/Y");
	$yetki = 0;
	if ($sifre == $sifre_tkr)
	{
		$varmi = uyeVarmi($email);
		if ($varmi == 0)
		{
			uyeyiKaydet($kadi,$email,$sifre,$ip,$kayit_tarihi,$yetki);
		}
		else
		{
			echo "Bu email zaten kayıtlı. Giriş yapmak için <a href='login.html'>tıklayın</a>";
		}
	}
	else
	{
		echo "Şifreler eşleşmiyor...<br>";
		echo "Kaydolmak için <a href='register.html'>tıklayın</a>";
	}
}
else
{
	echo "Lütfen önce formu doldurun!<br>";
	echo "Kaydolmak için <a href='register.html'>tıklayın</a>";
}





?>
