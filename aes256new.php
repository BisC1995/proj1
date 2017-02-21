<?php

$m="Hello"; //Plaintext of user's choice
$k="1A2B3C"; //Key of user's choice
create_iv($k);
function encrypt($plaintext,$key)
{
 
  //$size=mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256,MCRYPT_MODE_CBC);
 //$invec1="ABCD";
 //$invec2=$k2.$invec1;
 //$invec=strrev($invec2);
 $iv=create_iv();
 $size=strlen($iv); 
 $ciphertext=mcrypt_encrypt(MCRYPT_CAST_256,$key,$plaintext,MCRYPT_MODE_EBC);
 $ciphertext=$iv.$ciphertext;
 $ciphertext_encode=base64_encode($ciphertext);
 $ciphertext_dec = base64_decode($ciphertext_encode);
 $iv_dec = substr($ciphertext_dec, 0, $size);
 $ciphertext_dec = substr($ciphertext_dec, $size);
 echo $ciphertext_encode;
 
 decrypt($ciphertext_dec,$iv_dec,$key);
}
encrypt($m,$k);

function create_iv($k2)
{
	$k3=strrev($k2);
    $invec1="ABCDEFG";
	$invec2=$k3.$invec1;
	$invec=strrev($invec2);
    return $invec;
}
	 
function decrypt($c,$iv,$k1)
{
	 $plaintext=mcrypt_decrypt(MCRYPT_CAST_256,$k1,$c,MCRYPT_MODE_EBC);
	 echo "<br>".$plaintext;
	 
}



	