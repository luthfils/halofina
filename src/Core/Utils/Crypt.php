<?php /** @noinspection EncryptionInitializationVectorRandomnessInspection */

namespace Halofina\Core\Utils;

abstract class Crypt {
    private static $longKey  = 'edtechexpert@halofina';
    private static $shortKey  = 'edtechexpert1234';

    /**
     * @param string $message
     * @param string $secret
     *
     * @return string
     */
    public static function signatureSHA256($message,$secret) {
        return base64_encode(hash_hmac('sha256', $message, $secret, TRUE));
    }


    /**
     * @param $value
     * @return string
     */
    public static function encryptMD5($value)
    {
        $key = hash('sha256', self::$longKey);
        $cipher = 'AES-256-CBC';
        $iv = self::$shortKey;

        return base64_encode(openssl_encrypt($value,$cipher,$key,0,$iv));
    }

    /**
     * @param $value
     * @return string
     */
    public static function decryptMD5($value)
    {
        $key = hash('sha256', self::$longKey);
        $cipher = 'AES-256-CBC';
        $iv = self::$shortKey;
        return openssl_decrypt(base64_decode($value), $cipher, $key, 0, $iv);
    }
}