<?php

if(!isset($_POST['op'])) {
    ?>
<form id="form1" name="form1" method="post" action="">
  enter text
  <input name="data" type="text" />
  <input type="hidden" value="op" name="op" />
  <input type="submit" name="Submit" value="Submit" />
</form>
    <?php
}else {
    $buffer = $_POST['data']; 
    
    $extra = 8 - (strlen($buffer) % 8);
   
    if($extra > 0) {
        for($i = 0; $i < $extra; $i++) {
            $buffer .= "\0";
        }
    }
    
    $key = "kdvsjvbdskJBSLJlkjbvds";
    $iv = "abvabjdvb";
    
    echo "Result: ".bin2hex(@mcrypt_cbc(MCRYPT_3DES, $key, $buffer, MCRYPT_ENCRYPT, $iv));	
}
?>