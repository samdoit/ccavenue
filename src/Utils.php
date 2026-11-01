<?php

namespace Samdoit\CCAvenue;

class Utils
{
    /**
     * @param string $plainText Plain string to encrypt
     * @param string $key Working key provided by CCAvenue
     * @return string Encrypted hex string
     */
    public function encrypt(string $plainText, string $key): string
    {
        $derivedKey = hex2bin(md5($key)); // NOSONAR — CCAvenue API requires MD5 key derivation
        $initVector = "\x00\x01\x02\x03\x04\x05\x06\x07\x08\x09\x0a\x0b\x0c\x0d\x0e\x0f"; // NOSONAR
        $encrypted = openssl_encrypt($plainText, 'AES-128-CBC', $derivedKey, OPENSSL_RAW_DATA, $initVector);
        return bin2hex($encrypted);
    }

    /**
     * @param string $encryptedText Encrypted hex string
     * @param string $key Working key provided by CCAvenue
     * @return string Decrypted plain string
     */
    public function decrypt(string $encryptedText, string $key): string
    {
        $derivedKey = hex2bin(md5($key)); // NOSONAR — CCAvenue API requires MD5 key derivation
        $initVector = "\x00\x01\x02\x03\x04\x05\x06\x07\x08\x09\x0a\x0b\x0c\x0d\x0e\x0f"; // NOSONAR
        $encryptedText = trim($encryptedText);
        if ($encryptedText === '' || strlen($encryptedText) % 2 !== 0 || !ctype_xdigit($encryptedText)) {
            return '';
        }
        $decoded = hex2bin($encryptedText);
        return (string) openssl_decrypt($decoded, 'AES-128-CBC', $derivedKey, OPENSSL_RAW_DATA, $initVector);
    }
}
