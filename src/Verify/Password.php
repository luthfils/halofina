<?php namespace Halofina\Verify;

use Halofina\Assets\NotifPage;
use Halofina\Assets\VerifiedPage;
use Halofina\Core\Exception;
use Halofina\Core\Utils\Crypt;
use Halofina\Core\Utils\Curl;

abstract class Password {
    public static function routing($data) {
        $res = self::execute($data);
        if ($res['status'] === 1)
            echo VerifiedPage::get($res['response']['name']);
        else {
            echo NotifPage::get($res['response']);
        }
    }

    private static function execute($data) {
        $status = 0;
        $res = null;
        try {
            $arr = json_decode(Crypt::decryptMD5($data));
            if (!isset($arr->nickname, $arr->newpass, $arr->host) || $arr === null) {
                return (array('status' => $status, 'response' => 'Ada Kesalahan. Silakan Hubungi Customer Care Kami Untuk Info Lebih Lanjut.'));
            }

            $user = self::getUser($arr);
            if ($arr->newpass === $user['password']) {
                $res = 'Verifikasi Telah Dilakukan. Silakan Login Dengan Kata Sandi Terbarumu';
            } elseif ($arr->newpass !== null && $arr->newpass !== $user['password']) {
                $user = self::verifyPassword($arr);

                $status = 1;
                $res = array(
                    'name'  => $arr->nickname,
                );
            } else {
                $res = 'Ada Kesalahan. Silakan Coba Kembali atau Hubungi CS Kami';
            }
        } catch (Exception $e) {
            var_dump($e);
            $res = 'Terjadi Gangguan. Silakan Coba Kembali atau Hubungi CS Kami';
        }
            
        return array(
            'status'    => $status,
            'response'  => $res,
        );
    }

    private static function getUser($arr) {
        $route  = $arr->host . '/api/user';
        $param  = array('userid' => $arr->userid);
        $header = array('Content-Type: application/json');

        $res = Curl::connect($route, $param, $header, 'POST');
        return $res['d'];
    }

    private static function verifyPassword($arr) {
        $route  = $arr->host . '/api/password/verify';
        $param  = array('userid' => $arr->userid);
        $header = array('Content-Type: application/json');

        $res = Curl::connect($route, $param, $header, 'POST');
        return $res['d'];
    }
}