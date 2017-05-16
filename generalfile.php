<?php
$url = 'https://demo.perxclm2.com/PERX_API.php';
$key = '!QAZXSW@#EDCVFR$';
$iv = '56666852251557009888889955123458';
$username = 'diamondcustomer';
$password = string_encrypt('pass2word', $key,$iv);


function string_encrypt($string, $key, $iv) {

  $block = mcrypt_get_block_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
  $padding = $block - (strlen($string) % $block);
  $string .= str_repeat(chr($padding), $padding);

    $crypted_text = mcrypt_encrypt(
                            MCRYPT_RIJNDAEL_256, 
                            $key, 
                            $string, 
                            MCRYPT_MODE_CBC, $iv
                        );
    return base64_encode($crypted_text);
}


function string_decrypt($encrypted_string, $key, $iv) {
    return mcrypt_decrypt(
                    MCRYPT_RIJNDAEL_256, 
                    $key, 
                    base64_decode($encrypted_string), 
                    MCRYPT_MODE_CBC, $iv
                    );
}
?>