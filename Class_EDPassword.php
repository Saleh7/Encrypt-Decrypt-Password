<?php

class EDPassword{
     /**
     * @param string  Pss
     * @param string  Key
     * Encrypt My Pass
     */
    public function Encrypt_My_Pass($Pss,$Key){
       $Pssw0rd   = strrev($Pss);
       $Pssw0Size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
       $Pssw0     = mcrypt_create_iv($Pssw0Size, MCRYPT_RAND);
       $CryptPss  = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $Key, $Pssw0rd, MCRYPT_MODE_ECB, $Pssw0);
       $Encode64  = base64_encode($CryptPss);
       return $Encode64;
    }
     /**
     * @param string  Pss
     * @param string  Key
     * Decrypt My Pass
     */
    public function Decrypt_My_Pass($Pss,$Key){
       $CryptPss  = base64_decode($Pss);
       $Pssw0Size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
       $Pssw0     = mcrypt_create_iv($Pssw0Size, MCRYPT_RAND);
       $DecrypPss = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $Key, $CryptPss, MCRYPT_MODE_ECB, $Pssw0);
       $Decrypt   = trim(strrev($DecrypPss));
       return $Decrypt;
    }
}//End

?>
