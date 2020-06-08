<?php
include("fonksiyonlar.php");

if (isset($_POST["giris"]))
{
	$email = strip_tags($_POST["email"]);
	$sifre = strip_tags($_POST["sifre"]);

	$varmi = uyeVarmi($email);
	$girisKontrol = girisKontrol($email,$sifre);
	if ($varmi == 0)
	{
		echo "Bu email kayıtlı değil...";
	}
	else
	{
		if ($girisKontrol == 0)
		{
			echo "Şifreniz yanlış...";
		}
		else
		{
			session_start();
			$_SESSION["oturum"] = true;
			$bilgileri = tumBilgileri($email);
			$_SESSION["kadi"]=$bilgileri[0];
			$_SESSION["email"]=$bilgileri[1];
			$_SESSION["sifre"]=$bilgileri[2];
			$_SESSION["ip"]=$bilgileri[3];
			$_SESSION["kayit_zamani"]=$bilgileri[4];
			$_SESSION["yetki"]=$bilgileri[5];
			header("Location: index.php");

		}
	}
}
else
{
	echo "<a href='login.html'>Lütfen önce formu doldurun.</a>";
}


?>
