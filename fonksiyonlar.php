<?php

function uyeVarmi($email)
{
	$dosya = "users.txt";
	$sonuc = 0;
	if (file_exists($dosya))
	{
		$oku = fopen($dosya, "r");
		while (!feof($oku))
		{
			$satir = fgets($oku);
			$dizi = explode(";", $satir);
			if ($dizi[1] == $email)
			{
				$sonuc = 1;
				break;
			}
		}
		fclose($oku);
	}
	else
	{
		$sonuc = 0;
	}
	return $sonuc;
}

function girisKontrol($email,$sifre)
{
	$dosya = "users.txt";
	$sonuc = 0;
	if (file_exists($dosya))
	{
		$oku = fopen($dosya, "r");
		while (!feof($oku))
		{
			$satir = fgets($oku);
			$dizi = explode(";", $satir);
			if ($dizi[1] == $email && $dizi[2] == $sifre)
			{
				$sonuc = 1;
				break;
			}
		}
		fclose($oku);
	}
	else
	{
		$sonuc = 0;
	}
	return $sonuc;

}


function uyeyiKaydet($kadi,$email,$sifre,$ip,$kayitTarihi,$yetki)
{
	$dosya = "users.txt";
	$ekle = "\n".$kadi.";".$email.";".$sifre.";".$ip.";".$kayitTarihi.";".$yetki;
	$ac = fopen($dosya, "a");
	fwrite($ac, $ekle);
	fclose($ac);
	echo "Tebrikler başarıyla kaydoldunuz. Giriş yapmak için <a href='login.html'>tıklayınız</a> ";
}





function tumBilgileri($email)
{
	$dosya = "users.txt";
	if (file_exists($dosya))
	{
		$oku = fopen($dosya, "r");
		while ( !feof($oku))
		{
			$satir = fgets($oku);
			$dizi = explode(";",$satir);
			if ($dizi[1] == $email)
			{
				$deger[] = $dizi[0];
				$deger[] .= $dizi[1];
				$deger[] .= $dizi[2];
				$deger[] .= $dizi[3];
				$deger[] .= $dizi[4];
				$deger[] .= $dizi[5];
			}
		}
	}
	else
	{
		$deger = "";
	}
	return $deger;
}







?>
