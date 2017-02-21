<?php

$m="good bye"; //Plaintext of user's choice
$k="abcd"; //Key of user's choice

function encrypt($plaintext,$key)
{
 $size=mcrypt_get_iv_size(MCRYPT_RIJNDAEL_192,MCRYPT_MODE_CBC);
 $invec=mcrypt_create_iv($size,MCRYPT_DEV_RANDOM);
 $ciphertext=mcrypt_encrypt(MCRYPT_RIJNDAEL_192,$key,$plaintext,MCRYPT_MODE_CBC,$invec);
 $ciphertext=$invec.$ciphertext;
 $ciphertext_encode=base64_encode($ciphertext);
 $ciphertext_dec = base64_decode($ciphertext_encode);
 $iv_dec = substr($ciphertext_dec, 0, $size);
 $ciphertext_dec = substr($ciphertext_dec, $size);
 echo $ciphertext_encode;
 
 decrypt($ciphertext_dec,$iv_dec,$key);
}
encrypt($m,$k);

function decrypt($c,$iv,$k1)
{
	 $plaintext=mcrypt_decrypt(MCRYPT_RIJNDAEL_192,$k1,$c,MCRYPT_MODE_CBC,$iv);
	 echo"<br>".$plaintext;
	 
}



	